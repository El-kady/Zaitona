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

    public function add($section_id = 0,$type)
    {
        $section = $this->section->getRow($section_id) OR Service::getView()->errorPage();
        Service::getView()
            ->setTitle(Service::getText()->get("ADD"))
            ->render("materials/add", ["type" => $type,"course_id" => $section["course_id"],"section_id" => $section_id]);
    }

    public function save()
    {
        $course_id = Service::getRequest()->post("course_id");
        $section_id = Service::getRequest()->post("section_id");
        $data = [
            "title" => Service::getRequest()->post("title"),
            "type" => Service::getRequest()->post("type"),
            "course_id" => $course_id,
            "section_id" => $section_id,
        ];

        if ($this->material->insertData($data)) {
            Service::getRedirect()->to("/backend/materials/index/" . $section_id);
        } else {
            Service::getForm()->fillTmp('materials', $data);
            Service::getRedirect()->absolute(Service::getRequest()->post("back"));
        }
    }

    public function edit($id)
    {
        $row = $this->material->getRow((int)$id);
        Service::getForm()->fillData('materials', $row);

        Service::getView()
            ->setTitle(Service::getText()->get("EDIT"))
            ->render("materials/edit", ["id" => $row["id"],"section_id" => $row["section_id"]]);
    }

    public function update()
    {
        $section_id = Service::getRequest()->post("section_id");
        $data = [
            "title" => Service::getRequest()->post("title"),
        ];

        if ($this->material->updateData($data)) {
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
            $this->material->delete("id = :id ",[":id" => (int) $id]);
        }
        Service::getRedirect()->to("/backend/materials/index/" . $row["section_id"]);
    }

}
