<?php

namespace Core\Auth;

use \Core\Service\Service;

class Auth
{

    public static function checkAuthentication()
    {
        // initialize the session (if not initialized yet)
        Service::getSession()->init();

        // self::checkSessionConcurrency();

        // if user is NOT logged in...
        // (if user IS logged in the application will not run the code below and therefore just go on)
        if (!Service::getSession()->IsLoggedIn()) {

            // ... then treat user as "not logged in", destroy session, redirect to login page
            Service::getSession()->destroy();

            // send the user to the login form page, but also add the current page's URI (the part after the base URL)
            // as a parameter argument, making it possible to send the user back to where he/she came from after a
            // successful login
            header('location: ' . Config::get('URL') . 'login?redirect=' . urlencode($_SERVER['REQUEST_URI']));

            // to prevent fetching views via cURL (which "ignores" the header-redirect above) we leave the application
            // the hard way, via exit(). @see https://github.com/panique/php-login/issues/453
            // this is not optimal and will be fixed in future releases
            exit();
        }
    }

    /**
     * The admin authentication flow, just check if the user is logged in (by looking into the session) AND has
     * user role type 7 (currently there's only type 1 (normal user), type 2 (premium user) and 7 (admin)).
     * If user is not, then he will be redirected to login page and the application is hard-stopped via exit().
     * Using this method makes only sense in controllers that should only be used by admins.
     */
    public static function checkAdminAuthentication()
    {

        // if user is not logged in or is not an admin (= not role type 7)
        if (!Service::getSession()->IsLoggedIn() || Service::getSession()->get("user_account_type") != 7) {

            // ... then treat user as "not logged in", destroy session, redirect to login page
            Service::getSession()->destroy();
            header('location: ' . Config::get('URL') . 'login');

            // to prevent fetching views via cURL (which "ignores" the header-redirect above) we leave the application
            // the hard way, via exit(). @see https://github.com/panique/php-login/issues/453
            // this is not optimal and will be fixed in future releases
            exit();
        }
    }

    public function setLogin($user){

        session_regenerate_id(true);
        $_SESSION = array();

        Service::getSession()->set('user_id',$user["id"]);
        Service::getSession()->set('user_name',$user["name"]);
        Service::getSession()->set('user_email',$user["email"]);
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

    public function IsLoggedIn()
    {
        return (Service::getSession()->get('user_logged_in') ? true : false);
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
        Service::getSession()->destroy();
        $this->updateSessionId(Service::getSession()->get('user_id'));
    }
}
