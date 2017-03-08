<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;
use \Modules\Frontend\Models\Category;
use \Modules\Frontend\Models\Course;


class FrontendController extends BaseController
{
	
	public function __construct()
	{
  		parent::__construct();
  		$category = new Category();
		Service::getView()->assign("categories_tree",$category->getTree());
	}




}
