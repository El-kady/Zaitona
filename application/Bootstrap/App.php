<?php
namespace Bootstrap;

use Core\Service\Service;

class App
{
    private $url_modules = array('backend', 'frontend');
    private $url_module = 'frontend';

    private $url_controller = null;
    private $url_action = null;
    private $url_params = array();

    function __construct()
    {

        //routing system
        $this->splitUrl();

        $this->loadServices();

        $namespace = sprintf("\\Modules\\%s\\Controllers\\", ucfirst($this->url_module));

        if (!$this->url_controller) {
            $controller = $namespace . 'HomeController';
            $page = new $controller();
            $page->index();
        } elseif (file_exists(PATH_APP . 'Modules' . DS . ucfirst($this->url_module) . DS . 'Controllers' . DS . ucfirst($this->url_controller) . 'Controller.php')) {

            $controller = $namespace . ucfirst($this->url_controller) . 'Controller';
            $this->url_controller = new $controller();

            // check for method: does such a method exist in the controller ?
            if (method_exists($this->url_controller, $this->url_action)) {

                if (!empty($this->url_params)) {
                    // Call the method and pass arguments to it
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    // If no parameters are given, just call the method without parameters, like $this->home->method();
                    $this->url_controller->{$this->url_action}();
                }

            } else {
                if (strlen($this->url_action) == 0) {
                    // no action defined: call the default index() method of a selected controller
                    $this->url_controller->index();
                } else {
                    Service::getRedirect()->to("/error");
                }
            }
        } else {
            Service::getRedirect()->to("/error");
        }
    }

    private function loadServices()
    {
        $config = $this->loadFile(PATH_APP . 'Config' . DS . 'app.php');
        $config['PATH_MODULE'] = PATH_APP . 'Modules' . DS . ucfirst($this->url_module);

        Service::defDatabase(
            '\Core\Database\EasyPDO',
            array(
                sprintf('%s:host=%s;dbname=%s', $config['DB_TYPE'], $config['DB_HOST'], $config['DB_NAME']),
                $config['DB_USER'],
                $config['DB_PASS']
            )
        );

        Service::defConfig('\Core\Helpers\ConfigLoader', array($config));

        Service::defText('\Core\System\Text', array(Service::getConfig()->get("site_lang")));

        Service::defSession('\Core\Auth\Session');
        Service::defAuth('\Core\Auth\Auth');

        Service::defForm('\Core\Helpers\Form');
        Service::defRequest('\Core\Request\Request');
        Service::defRedirect('\Core\Request\Redirect');
        Service::defUploader('\Core\System\Uploader', array($config["PATH_UPLOADS"], 1024 * 1024 * 10));
        Service::defMailer('\Core\System\Mailer', array(Service::getConfig()->get("smtp_server"),Service::getConfig()->get("smtp_email"),Service::getConfig()->get("smtp_password"),Service::getConfig()->get("smtp_port")));

        Service::defView('\Core\System\View', array($this->requestInfo()));

    }

    private function loadFile($file)
    {
        if (file_exists($file)) {
            return include $file;
        }
        return false;
    }

    public function requestInfo()
    {
        return array(
            "module" => ucfirst($this->url_module),
            "controller" => (!empty($this->url_controller)) ? ucfirst($this->url_controller) : "Home",
            "action" => (!empty($this->url_action)) ? $this->url_action : "index",
            "params" => $this->url_params
        );
    }

    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Put URL parts into according properties

            if (isset($url[0]) && in_array($url[0], $this->url_modules)) {
                $this->url_module = isset($url[0]) ? $url[0] : null;
                $this->url_controller = isset($url[1]) ? $url[1] : null;
                $this->url_action = isset($url[2]) ? $url[2] : null;

                unset($url[0], $url[1], $url[2]);
            } else {
                $this->url_controller = isset($url[0]) ? $url[0] : null;
                $this->url_action = isset($url[1]) ? $url[1] : null;

                unset($url[0], $url[1]);
            }


            // Rebase array keys and store the URL params
            $this->url_params = array_values($url);

            // for debugging. uncomment this if you have problems with the URL
            //echo 'Module: ' . $this->url_module . '<br>';
            //echo 'Controller: ' . $this->url_controller . '<br>';
            //echo 'Action: ' . $this->url_action . '<br>';
            //echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';

        }
    }


}

