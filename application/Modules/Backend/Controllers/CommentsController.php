<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Modules\Backend\Models\Category;
use \Modules\Backend\Models\Course;
use \Modules\Backend\Models\Section;
use \Modules\Backend\Models\Material;
use \Modules\Backend\Models\Comment;
use \Modules\Backend\Models\User;


class CommentsController extends BackendController
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
        $this->comment = new Comment();
        $this->category = new Category();
        $this->course = new Course();
        $this->section = new Section();
        $this->material = new Material();
        $this->user = new User();
    }

    public function view()
    {
        $rows = $this->comment->getAll();
        Service::getView()
            ->setTitle(Service::getText()->get("COMMENTS"))
            ->render("comments/index", ["rows" => $rows]);
    }

    public function index()
    {

        $rows = $this->comment->getAll();


        for ($i = 0; $i < count($rows); $i++) {
            $rows[$i]['user_name'] = $this->user->getRow($rows[$i]['user_id'], 'id');
        }

        Service::getView()->setTitle(Service::getText()->get("COMMENTS"))->render("comments/index", ["rows" => $rows]);

    }

    public function delete($id)
    {
        if (Service::getRequest()->post("delete")) {
            $this->Comment->delete("id = :id ", [":id" => (int)$id]);
        }
        Service::getRedirect()->to("/backend/comments");
    }

    public function edit($id)
    {
        $row = $this->comment->getRow((int)$id);
        Service::getForm()->fillData('comments', $row);

        Service::getView()
            ->setTitle(Service::getText()->get("EDIT"))
            ->render("comments/edit", ["id" => $row["id"]]);
    }

    public function save($id = 0)
    {
        $data = [
            "comment" => Service::getRequest()->post("comment")
        ];

        if ($this->comment->saveData($data, (int)$id)) {
            Service::getRedirect()->to("/backend/comments");
        } else {
            Service::getForm()->fillTmp('comments', $data);
        }
    }

}