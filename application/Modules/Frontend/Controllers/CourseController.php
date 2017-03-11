<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\Category;
use \Modules\Frontend\Models\Course;
use Modules\Frontend\Models\Request;
use \Modules\Frontend\Models\Section;
use \Modules\Frontend\Models\Material;
use \Modules\Frontend\Models\User;

class CourseController extends FrontendController
{
    private $category;
    private $course;
    private $section;
    private $material;
    private $request;
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->category = new Category();
        $this->course = new Course();
        $this->section = new Section();
        $this->material = new Material();
        $this->request = new Request();
        $this->user = new User();
    }

    public function index()
    {
        Service::getRedirect()->to("/home");
    }

    public function view($id,$page = 0)
    {
        $id = (int)$id;
        if($id > 0){
            $course = $this->course->getRow($id,'id');
            $category = $this->category->getRow($course['category_id'],'id');
            $category_parent = $this->category->getRow($category['parent_id'],'id');
            $instructor = $this->user->getRow($course["user_id"]);

            $sections = [];
            foreach ((array) $this->section->getAllByCond($course['id'],'course_id') as $section) {
                $sections[$section["id"]] = $section;
                $sections[$section["id"]]['materials'] = $this->material->getAllByCond($section["id"],'section_id');
            }

            Service::getView()->setTitle($course["title"])->render("course/view",["course" => $course,"category" => $category,"category_parent" => $category_parent,"sections" => $sections,"instructor" => $instructor]);
        }else{
            Service::getRedirect()->to("/home");
        }
    }

    public function request($course_id)
    {
        Service::getView()->setTitle(Service::getText()->get("REQUEST_TITLE"))->render("request/request",["course_id" => $course_id]);
    }

    public function saveRequest(){

        $course_id = Service::getRequest()->post("course_id");

        $data = [
            "request" => Service::getRequest()->post("request"),
            "course_id" => $course_id,
        ];

        if ($this->request->saveData($data)) {
            Service::getSession()->add('feedback_positive', Service::getText()->get("REQUEST_SENT"));
        }

        Service::getRedirect()->to("/course/request/" . $course_id);
    }

}
