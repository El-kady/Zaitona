<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Modules\Backend\Models\Comment;

class CommentController extends BackendController
{

    private $Comment;

    function __construct()
    {
        parent::__construct();
        $this->Comment = new Comment();
    }
}