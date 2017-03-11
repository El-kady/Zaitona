<?php

namespace Modules\Frontend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Material extends BaseModel
{
    protected $table = "materials";
    public function getRow($value,$field = "id")
    {
    	$row = parent::getRow($value,$field = "id");
    	if ($row['type'] == '2') {
    		preg_match('~v=([a-z0-9_-]+)~i', $row['link'], $matches);
    		$row['link_id'] = $matches['1'];
    	}
    	return $row;
    }
}