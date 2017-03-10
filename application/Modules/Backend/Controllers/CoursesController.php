<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Modules\Backend\Models\Course;
use \Modules\Backend\Models\Category;

class CoursesController extends BackendController
{

    private $course;
    private $category;

    function __construct()
    {
        parent::__construct();

        $this->course = new Course();
        $this->category = new Category();
    }

    public function index()
    {
        $rows = $this->course->getAll();
        Service::getView()
            ->setTitle(Service::getText()->get("COURSES"))
            ->render("courses/index", ["rows" => $rows]);
    }

    public function add()
    {
        $cats_tree = $this->category->getTree();
        Service::getView()
            ->setTitle(Service::getText()->get("ADD"))
            ->render("courses/form", ["cats_tree" => $cats_tree]);
    }

    public function edit($id)
    {
        $row = $this->course->getRow((int) $id);
        Service::getForm()->fillData('courses', $row);

        $cats_tree = $this->category->getTree();
        Service::getView()
            ->setTitle(Service::getText()->get("EDIT"))
            ->render("courses/form", ["id" => $row["id"],"cats_tree" => $cats_tree]);
    }

    public function save($id = 0)
    {
        $data = [
            "title" => Service::getRequest()->post("title"),
            "introduction" => Service::getRequest()->post("introduction"),
            "description" => Service::getRequest()->post("description"),
            "requirement" => Service::getRequest()->post("requirement"),
            "audience" => Service::getRequest()->post("audience"),
            "category_id" => Service::getRequest()->post("category_id"),
            "featured_image" => Service::getRequest()->file("featured_image"),
        ];

        if ($this->course->saveData($data, (int) $id)) {
            Service::getRedirect()->to("/backend/courses");
        } else {
            Service::getForm()->fillTmp('courses', $data);
            Service::getRedirect()->absolute( Service::getRequest()->post("back"));
        }
    }

    public function delete($id)
    {
        if (Service::getRequest()->post("delete")) {
            $this->course->delete("id = :id ",[":id" => (int) $id]);
        }
        Service::getRedirect()->to("/backend/courses");
    }

}
