<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Modules\Backend\Models\Section;
use \Modules\Backend\Models\Course;
use \Modules\Backend\Models\Category;

class SectionsController extends BackendController
{

    private $section;
    private $course;
    private $category;

    function __construct()
    {
        parent::__construct();

        $this->section = new Section();
        $this->course = new Course();
        $this->category = new Category();
    }

    public function index($course_id = 0)
    {
        if ((int)$course_id == 0 || ($row = $this->course->getRow($course_id)) == false) {
            Service::getView()->errorPage();
        }

        $rows = $this->section->getAllByCond($course_id,"course_id");
        Service::getView()
            ->setTitle(Service::getText()->get("COURSES"))
            ->render("sections/index", ["row" => $row, "rows" => $rows]);
    }

    public function add($course_id = 0)
    {
        if ((int)$course_id == 0) {
            Service::getView()->errorPage();
        }
        Service::getView()
            ->setTitle(Service::getText()->get("ADD"))
            ->render("sections/form", ["course_id" => $course_id]);
    }

    public function edit($id)
    {
        $row = $this->section->getRow((int)$id);
        Service::getForm()->fillData('sections', $row);

        Service::getView()
            ->setTitle(Service::getText()->get("EDIT"))
            ->render("sections/form", ["id" => $row["id"],"course_id" => $row["course_id"]]);
    }

    public function save($id = 0)
    {
        $course_id = Service::getRequest()->post("course_id");
        $data = [
            "title" => Service::getRequest()->post("title"),
            "course_id" => $course_id,
        ];

        if ($this->section->saveData($data, (int)$id)) {
            Service::getRedirect()->to("/backend/sections/index/" . $course_id);
        } else {
            Service::getForm()->fillTmp('sections', $data);
            Service::getRedirect()->absolute(Service::getRequest()->post("back"));
        }
    }

    public function delete($id)
    {
        $this->section->delete("id = :id ", [":id" => (int)$id]);
        Service::getRedirect()->to("/backend/sections");
    }

}
