<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;
use \Modules\Frontend\Models\Category;
use \Modules\Frontend\Models\Course;


class FrontendController extends BaseController
{
	protected $category;
	protected $course;
	
	public function __construct()
	{
  		parent::__construct();
  		$this->category = new Category();
  		$categories = $this->category->getTree();
		Service::getView()->assign("categories",$categories);
		$this->course = new Course();
  		$courses = $this->course->getAll();
		Service::getView()->assign("courses",$courses);
	}




}
