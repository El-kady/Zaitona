<?php

namespace Core\Auth;

use \Core\Service\Service;

class Auth
{

    public function checkAuthentication()
    {
        if (!$this->IsLoggedIn()) {
            $this->logout();
            Service::getRedirect()->to("/login");
            exit();
        }
    }

    public function checkAdminAuthentication()
    {
        if (!$this->IsLoggedIn() || Service::getSession()->get("user_account_type") != 2) {
            $this->logout();
            Service::getRedirect()->to("/login");
            exit();
        }
    }

    public function setLogin($user){

        session_regenerate_id(true);
        $_SESSION = array();

        Service::getSession()->set('user_id',$user["id"]);
        Service::getSession()->set('user_name',$user["name"]);
        Service::getSession()->set('user_email',$user["email"]);
        Service::getSession()->set('user_photo',$user["user_photo"]);
        Service::getSession()->set('user_account_type',$user["account_type"]);
        Service::getSession()->set('user_status',$user["status"]);
        Service::getSession()->set('user_logged_in',true);

        $this->updateSessionId($user["id"], session_id());

        return true;
    }

    public function getUserId()
    {
        return ($this->IsLoggedIn()) ? Service::getSession()->get('user_id') : 0;
    }

    public function isLoggedIn()
    {
        return (Service::getSession()->get('user_logged_in') ? true : false);
    }

    public function isBanned()
    {
        return (Service::getSession()->get('user_status') == 3);
    }

    public function checkSessionConcurrency(){
        if($this->IsLoggedIn()){
            if($this->isConcurrentSessionExists()){
                $this->logout();
                Service::getRedirect()->home();
                exit();
            }
        }
    }

    public function isConcurrentSessionExists()
    {
        $session_id = session_id();
        $userId = Service::getSession()->get('user_id');

        if (isset($userId) && isset($session_id)) {
            $userSessionId = Service::getDatabase()->fetchOne("SELECT session_id FROM users WHERE id = :id LIMIT 1",array(":id" => $userId));
            return $session_id !== $userSessionId;
        }

        return false;
    }

    public function updateSessionId($userId, $sessionId = null)
    {
        Service::getDatabase()->update(
            "users",
            array("session_id" => $sessionId),
            array("id" => (int) $userId)
        );
    }

    public function logout()
    {
        $this->updateSessionId(Service::getSession()->get('user_id'));
        Service::getSession()->destroy();
    }
}
