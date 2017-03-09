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
            "site_name" => Service::getRequest()->post("site_name")
        ];

        $this->config->saveData($data);

        Service::getRedirect()->to("/backend/settings");
    }

}
