<?php

namespace Core\System;


class Mailer
{
    const CRLF = "\r\n";
    const TLS = 'tcp';
    const SSL = 'ssl';
    const OK = 250;

    protected $server;
    protected $port;
    protected $localhost;
    protected $socket;
    protected $charset;
    protected $username;
    protected $password;
    protected $connect_timeout;
    protected $response_timeout;
    protected $headers;
    protected $content_type;
    protected $from;
    protected $to;
    protected $cc;
    protected $reply_to;
    protected $bcc;
    protected $subject;
    protected $message_html = false;
    protected $message_text = false;
    protected $log;
    protected $is_html;
    protected $tls = false;
    protected $protocol;
    protected $boundary = 'boundary';

    public function __construct($server,$username,$password, $port = 25, $connection_timeout = 30, $response_timeout = 8)
    {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
        $this->localhost = $server;
        $this->connect_timeout = $connection_timeout;
        $this->response_timeout = $response_timeout;
        $this->from = array();
        $this->to = array();
        $this->cc = array();
        $this->bcc = array();
        $this->log = array();
        $this->reply_to = array();
        $this->is_html = false;
        $this->protocol = Mailer::SSL;
        $this->charset = 'utf-8';
        $this->boundary = sha1(microtime());
        $this->headers['MIME-Version'] = '1.0';
    }

    public function addTo($address, $name = '')
    {
        $this->to[] = array($address, $name);
    }

    public function addCc($address, $name = '')
    {
        $this->cc[] = array($address, $name);
    }

    public function addBcc($address, $name = '')
    {
        $this->bcc[] = array($address, $name);
    }

    public function addReplyTo($address, $name = '')
    {
        $this->reply_to[] = array($address, $name);
    }

    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    public function setProtocol($protocol = '')
    {
        if ($protocol == self::TLS) {
            $this->tls = true;
        }

        $this->protocol = $protocol;
    }

    public function setFrom($address, $name = '')
    {
        $this->from = array($address, $name);
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setText($message)
    {
        $this->message_text = $message;
    }

    public function setHTML($message)
    {
        $this->message_html = $message;
    }

    public function setMessage($message, $html = false,$values = [])
    {

        foreach ($values as $key => $value) {
            $message = str_replace("[".$key."]",$value,$message);
        }

        if ($html) {
            $this->setHTML($message);
        } else {
            $this->setText($message);
        }
    }

    public function getLog()
    {
        return $this->log;
    }

    public function send()
    {
        var_dump($this->port);
        $this->socket = fsockopen($this->getServer(), $this->port, $error_number, $error_string, $this->connect_timeout);
        if (empty($this->socket)) {
            return false;
        }

        $this->log['CONNECTION'] = $this->getResponse();
        $this->log['HELLO'] = $this->sendCMD('EHLO ' . $this->localhost);

        if ($this->tls) {
            $this->log['STARTTLS'] = $this->sendCMD('STARTTLS');

            stream_socket_enable_crypto($this->socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);

            $this->log['HELLO 2'] = $this->sendCMD('EHLO ' . $this->localhost);
        }

        $this->log['AUTH'] = $this->sendCMD('AUTH LOGIN');
        $this->log['USERNAME'] = $this->sendCMD(base64_encode($this->username));
        $this->log['PASSWORD'] = $this->sendCMD(base64_encode($this->password));
        $this->log['MAIL_FROM'] = $this->sendCMD('MAIL FROM: <' . $this->from[0] . '>');

        foreach (array_merge($this->to, $this->cc) as $address) {
            $this->log['RECIPIENTS'][] = $this->sendCMD('RCPT TO: <' . $address[0] . '>');
        }

        $this->log['DATA'][1] = $this->sendCMD('DATA');


        if ($this->message_html && $this->message_text) {
            $this->headers['Content-type'] = 'multipart/alternative; boundary="' . $this->boundary . '"';
            $data = '--' . $this->boundary . self::CRLF;
            $data .= 'Content-type: text/plain; charset=' . $this->charset . self::CRLF . self::CRLF;
            $data .= $this->message_text . self::CRLF . self::CRLF;
            $data .= '--' . $this->boundary . self::CRLF;
            $data .= 'Content-type: text/html; charset=' . $this->charset . self::CRLF . self::CRLF;
            $data .= $this->message_html . self::CRLF . self::CRLF;
            $data .= '--' . $this->boundary . '--';
        } elseif ($this->message_html) {
            $this->headers['Content-type'] = 'text/html; charset=' . $this->charset;
            $data = $this->message_html;
        } else {
            $this->headers['Content-type'] = 'text/plain; charset=' . $this->charset;
            $data = $this->message_text;
        }

        $this->headers['From'] = $this->formatAddress($this->from);
        $this->headers['To'] = $this->formatAddressList($this->to);
        if (!empty($this->cc)) {
            $this->headers['Cc'] = $this->formatAddressList($this->cc);
        }

        if (!empty($this->bcc)) {
            $this->headers['Bcc'] = $this->formatAddressList($this->bcc);
        }

        if (!empty($this->reply_to)) {
            $this->headers['Reply-To'] = $this->formatAddressList($this->reply_to);
        }

        $this->headers['Subject'] = $this->subject;
        $this->headers['Date'] = date('r');
        $headers = '';
        foreach ($this->headers as $key => $val) {
            $headers .= $key . ': ' . $val . self::CRLF;
        }

        $this->log['DATA'][2] = $this->sendCMD($headers . self::CRLF . $data . self::CRLF . '.');
        $this->log['QUIT'] = $this->sendCMD('QUIT');
        fclose($this->socket);
        return substr($this->log['DATA'][2], 0, 3) == self::OK;
    }

    protected function getServer()
    {
        return ($this->protocol) ? $this->protocol . '://' . $this->server : $this->server;
    }

    protected function getResponse()
    {
        stream_set_timeout($this->socket, $this->response_timeout);
        $response = '';
        while (($line = fgets($this->socket, 515)) != false) {
            $response .= trim($line) . "\n";
            if (substr($line, 3, 1) == ' ') {
                break;
            }
        }
        return trim($response);
    }


    protected function sendCMD($cmd)
    {
        // TODO: Error checking
        fputs($this->socket, $cmd . self::CRLF);
        return $this->getResponse();
    }


    protected function formatAddress($address)
    {
        return ($address[1] == '') ? $address[0] : '"' . $address[1] . '" <' . $address[0] . '>';
    }

    protected function formatAddressList($addresses)
    {
        $list = '';
        foreach ($addresses as $address) {
            if ($list) {
                $list .= ', ' . self::CRLF . "\t";
            }
            $list .= $this->formatAddress($address);
        }
        return $list;
    }
}