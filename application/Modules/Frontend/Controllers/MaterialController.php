<?php
namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\Category;
use \Modules\Frontend\Models\Course;
use \Modules\Frontend\Models\Section;
use \Modules\Frontend\Models\Material;
use \Modules\Frontend\Models\Comment;
use \Modules\Frontend\Models\User;


class MaterialController extends FrontendController
{
    private $category;
    private $course;
    private $section;
    private $material;
    private $comment;
    private $user;
    function __construct()
    {
        parent::__construct();
        $this->category = new Category();
        $this->course = new Course();
        $this->section = new Section();
        $this->material = new Material();
        $this->comment = new Comment();
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
            $data['material'] = $this->material->getRow($id,'id');
            $data['instructor'] = $this->user->getRow($data['material']['user_id'],'id');
            $data['section'] = $this->section->getRow($data['material']['section_id'],'id');
            $data['course'] = $this->course->getRow($data['material']['course_id'],'id');
            $data['category'] = $this->category->getRow($data['course']['category_id'],'id');
            $data['category_parent'] = $this->category->getRow($data['category']['parent_id'],'id');
            $data['comments'] = $this->comment->getAllByCond($id,'material_id');
            for ($i = 0; $i < count($data['comments']); $i++) {
                $data['comments'][$i]['user_name'] = $this->user->getRow($data['comments'][$i]['user_id'],'id');
            }
            Service::getView()->setTitle(Service::getText()->get("COURSES_TITLE"))->render("material/view",$data);            
        }else{
            Service::getRedirect()->to("/home");
        }
    }

    public function download($id)
    {
        $id = (int)$id;
        if($id > 0){
            $data['material'] = $this->material->getRow($id,'id');
            $filename = Service::getConfig()->get("PATH_UPLOADS").$data['material']['file_name'];
     
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: '.$data['material']['file_type']);
            
            header('Content-Disposition: attachment; filename="'. $data['material']['title'] . '";');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . $data['material']['file_size']);
            readfile($filename);
            exit;
            
        }else{
            Service::getRedirect()->to("/home");
        }
    }


}
