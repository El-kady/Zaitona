<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;
use \Modules\Frontend\Models\Category;


class FrontendController extends BaseController
{
	private $category;
	public function __construct()
	{
  		parent::__construct();
  		$this->category = new Category();
	}




}
