<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Modules\Frontend\Models\Course;

class HomeController extends FrontendController
{

    private $course;

    function __construct()
    {
        parent::__construct();
       $this->course = new Course();
    }

    public function index()
    {
        $courses = $this->course->getAll(4);
        Service::getView()->setTitle(Service::getConfig()->get("site_name"))->render("index",["courses" => $courses]);
    }

}
