<?php
namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\Category;
use \Modules\Frontend\Models\Course;
use \Modules\Frontend\Models\Section;
use \Modules\Frontend\Models\Material;

class MaterialController extends FrontendController
{
    private $category;
    private $course;
    private $section;
    private $material;
    function __construct()
    {
        parent::__construct();
        $this->category = new Category();
        $this->course = new Course();
        $this->section = new Section();
        $this->material = new Material();
    }

    public function index()
    {
        Service::getRedirect()->to("/home");
    }

    public function view($id,$page = 0)
    {
        $id = (int)$id;
        if($id > 0){
            $data['material'] = $this->material->getRow($id,'id');
            $data['section'] = $this->section->getRow($data['material']['section_id'],'id');
            $data['course'] = $this->course->getRow($data['material']['course_id'],'id');
            $data['category'] = $this->category->getRow($data['course']['category_id'],'id');
            $data['category_parent'] = $this->category->getRow($data['category']['parent_id'],'id');
            
            
            Service::getView()->setTitle(Service::getText()->get("COURSES_TITLE"))->render("material/view",$data);            
        }else{
            Service::getRedirect()->to("/home");
        }
    }


}
