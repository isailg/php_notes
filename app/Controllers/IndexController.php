<?php

namespace App\Controllers;

use App\Models\{Job, Project};
use Zend\Diactoros\Response\HtmlResponse;


class IndexController extends BaseController{
  public function indexAction(){
    $jobs = Job::all();
    $project1 = new Project ('Project1','Description1');
    $projects = [
      $project1 ];

    $nickname= "@isailg";
    $name = "Isaí López García";
    return $this->renderHTML('index.twig', [
      'name' => $name,
      'jobs' => $jobs
    ]);
  }
}
