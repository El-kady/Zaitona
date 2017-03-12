<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use Modules\Backend\Models\Config;

class SettingsController extends BackendController
{
    private $config;

    function __construct()
    {
        parent::__construct();
        $this->config = new Config();
    }

    public function index()
    {
        $configs = Service::getConfig()->getAll();

        Service::getForm()->fillData('settings', (array)$configs);
        Service::getView()->setTitle(Service::getConfig()->get("site_name"))->render("settings");
    }

    public function save()
    {

        $data = [
            "site_name" => Service::getRequest()->post("site_name"),
            "site_lang" => Service::getRequest()->post("site_lang"),
            "site_slogan" => Service::getRequest()->post("site_slogan"),
            "site_email" => Service::getRequest()->post("site_email"),
            "smtp_server" => Service::getRequest()->post("smtp_server"),
            "smtp_port" => Service::getRequest()->post("smtp_port"),
            "smtp_email" => Service::getRequest()->post("smtp_email"),
            "smtp_password" => Service::getRequest()->post("smtp_password"),
            "welcome_email_template" => Service::getRequest()->post("welcome_email_template"),
        ];

        if(!$this->config->saveData($data)){
            Service::getForm()->fillTmp('settings', (array) $data);
        }

        Service::getRedirect()->to("/backend/settings");
    }

}
