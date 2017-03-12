<?php

namespace Modules\Frontend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Comment extends BaseModel
{
    protected $table = "comments";

    public function add($comment, $user, $material)
    {
        if (!empty($comment) && !empty($user) && !empty($material)) {
            $record = [
                "material_id" => $material,
                "user_id" => $user,
                "comment" => $comment
            ];
            if ($this->insert($record)) {
                return true;
            }
        } else {
            Service::getSession()->add('feedback_negative', Service::getText()->get("FILL_ALL_FIELDS"));
        }
        return false;
    }
}