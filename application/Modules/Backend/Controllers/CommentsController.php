<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Modules\Backend\Models\Comment;

class CommentsController extends BackendController
{

    private $Comment;

    function __construct()
    {
        parent::__construct();
        $this->Comment = new Comment();
    }

    public function index()
    {
        $rows = $this->Comment->getAll();
        Service::getView()
            ->setTitle(Service::getText()->get("COMMENTS"))
            ->render("comments/index", ["rows" => $rows]);
    }

    public function delete($id)
    {
        if (Service::getRequest()->post("delete")) {
            $this->Comment->delete("id = :id ", [":id" => (int)$id]);
        }
        Service::getRedirect()->to("/backend/comments");
    }

    public function edit($id){
        $row = $this->Comment->getRow((int)$id);
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

        if ($this->Comment->saveData($data, (int)$id)) {
            Service::getRedirect()->to("/backend/comments");
        } else {
            Service::getForm()->fillTmp('comments', $data);
        }
    }

}