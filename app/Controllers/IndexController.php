<?php

namespace App\Controllers;

use App\Models\{Job, Project};

class IndexController{
  public function indexAction(){
    $jobs = Job::all();
    $project1 = new Project ('Project1','Description1');
    $projects = [
      $project1 ];

    $nickname= "@isailg";
    $name = "Isaí López García";
    include '../views/index.php';
  }
}
