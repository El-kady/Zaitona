<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Modules\Backend\Models\Section;
use \Modules\Backend\Models\Course;
use \Modules\Backend\Models\Category;
use \Modules\Backend\Models\Material;

class MaterialsController extends BackendController
{

    private $section;
    private $course;
    private $category;
    private $material;

    function __construct()
    {
        parent::__construct();

        $this->category = new Category();
        $this->course = new Course();
        $this->section = new Section();
        $this->material = new Material();
    }

    public function index($section_id = 0)
    {
        $row = $this->section->getRow($section_id) OR Service::getView()->errorPage();
        $rows = $this->material->getAllByCond($section_id,"section_id");

        Service::getView()
            ->setTitle(Service::getText()->get("MATERIALS"))
            ->render("materials/index", ["row" => $row, "rows" => $rows]);
    }

    public function add($section_id = 0)
    {
        $section = $this->section->getRow($section_id) OR Service::getView()->errorPage();
        Service::getView()
            ->setTitle(Service::getText()->get("ADD"))
            ->render("materials/form", ["course_id" => $section["course_id"],"section_id" => $section_id]);
    }

    public function edit($id)
    {
        $row = $this->material->getRow((int)$id);
        Service::getForm()->fillData('materials', $row);

        Service::getView()
            ->setTitle(Service::getText()->get("EDIT"))
            ->render("materials/form", ["id" => $row["id"],"course_id" => $row["course_id"],"section_id" => $row["section_id"]]);
    }

    public function save($id = 0)
    {
        $course_id = Service::getRequest()->post("course_id");
        $section_id = Service::getRequest()->post("section_id");
        $data = [
            "title" => Service::getRequest()->post("title"),
            "course_id" => $course_id,
            "section_id" => $section_id,
        ];

        if ($this->material->saveData($data, (int)$id)) {
            Service::getRedirect()->to("/backend/materials/index/" . $section_id);
        } else {
            Service::getForm()->fillTmp('materials', $data);
            Service::getRedirect()->absolute(Service::getRequest()->post("back"));
        }
    }

    public function delete($id)
    {
        $row = $this->material->getRow($id) OR Service::getView()->errorPage();
        if (Service::getRequest()->post("delete")) {
            $this->section->delete("id = :id ",[":id" => (int) $id]);
        }
        Service::getRedirect()->to("/backend/materials/index/" . $row["section_id"]);
    }

}
