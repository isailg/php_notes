<?php

namespace App\Controllers;

use App\Models\{Job, Project};
use Zend\Diactoros\Response\HtmlResponse;


class AdminController extends BaseController{
  public function getAdmin(){
    return $this->renderHTML('admin.twig');
  }
}
