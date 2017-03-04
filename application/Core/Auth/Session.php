<?php

namespace Core\Auth;

use Core\Service\Service;

class Session
{

    public function init()
    {
        if (session_id() == '') {
            session_start();
        }
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];
            return Service::getRequest()->XSSFilter($value);
        }
    }

    public function add($key, $value)
    {
        $_SESSION[$key][] = $value;
    }


    public function destroy()
    {
        session_destroy();
    }


    public function updateSessionId($userId, $sessionId = null)
    {
        Service::getDatabase()->update(
            "users",
            array("session_id" => $sessionId),
            array("user_id" => $userId)
        );
    }

    /**
     * checks for session concurrency
     */
    public function isConcurrentSessionExists()
    {
        $session_id = session_id();
        $userId = Session::get('user_id');

        if (isset($userId) && isset($session_id)) {

            $user = Service::getDatabase()->fetchOne("SELECT session_id FROM users WHERE id = :id LIMIT 1",array(":id" => $userId));
var_dump($user);
            $userSessionId = !empty($result) ? $result->session_id : null;

            return $session_id !== $userSessionId;
        }

        return false;
    }

    /**
     * Checks if the user is logged in or not
     *
     * @return bool user's login status
     */
    public function userIsLoggedIn()
    {
        return ($this->get('user_logged_in') ? true : false);
    }
}
