<?php
namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\Comment;


class CommentController extends FrontendController
{
   
    private $comment;
    function __construct()
    {
        parent::__construct();
        $this->comment = new Comment();
    }

    public function index()
    {
        Service::getRedirect()->to("/home");
    }

    public function view()
    {
        Service::getRedirect()->to("/home");
    }

    public function save()
    {

        $comment = Service::getRequest()->post("comment");
        $user = Service::getRequest()->post("user");
        $material = Service::getRequest()->post("material");


        if ($this->comment->add($comment,$user,$material)) 
        {
            Service::getRedirect()->absolute(Service::getRequest()->post("back"));
        }else{
            Service::getRedirect()->to("/home");
        }

    }

    public function edit()
    {

        $comment = Service::getRequest()->post("comment");
        $comment_id = Service::getRequest()->post("comment_id");
        $user = Service::getRequest()->post("user");
        $material = Service::getRequest()->post("material");
        $user_logged = Service::getSession()->get("user_id");
        $user_type = Service::getSession()->get("user_account_type");

        if ($user_logged == $user || $user_type == 2) {
            if ($this->comment->update(['comment' => $comment,'user_id' => $user,'material_id' => $material],"id = :id ",[":id" => (int) $comment_id])) 
            {
                Service::getRedirect()->absolute(Service::getRequest()->post("back"));
            }else{
                Service::getRedirect()->to("/home");
            }
        }

    }

    public function delete($id, $material)
    {
        $row = $this->comment->getRow($id);
        $user_logged = Service::getSession()->get("user_id");
        $user_type = Service::getSession()->get("user_account_type");
        
        if ($user_logged == $row['user_id'] || $user_type == 2) {
            $this->comment->delete("id = :id ",[":id" => (int) $id]) ;
            Service::getRedirect()->to("/material/view/" . $material);
        }else{
            Service::getRedirect()->to("/home");
        }
    }

}
