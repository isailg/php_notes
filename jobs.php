<?php
require_once 'vendor/autoload.php';
/*
use App\Models\Job;
use App\Models\Project;
use App\Models\Printable;
*/
use App\Models\{Job,Project,Printable};

$job1 = new Job('PHP Developer','This is for real!!!');
$job1->months = 16;

$job2 = new Job('Python developer','this is for OK!!!');
$job2->months = 24;

$job3 = new Job('','this is for real!!!');
$job3->months = 24;

$jobs = [
  $job1,
  $job2,
  $job3
];

$project1 = new Project ('Project1','Description1');



$projects = [
  $project1 ];

function printElement(Printable $job){
  if ($job->visible == false){
    return;
  }
  echo '<li class="work-position">';
  echo '<h5>' . $job->getTitle() . '</h5>';
  echo '<p>' . $job->getDescription() . ' </p>';
  echo '<p>' . $job->getDurationAsString() . ' </p>';
  echo '<strong>Achievements:</strong>';
  echo '<ul>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '</ul>';
  echo '</li>';
}







/*Array
$array = array (
  "course1" => "php",
  "course2" => "js",
);

$jobs= [
  0 => 'PHP Developer',
  1 => 'Python Developer',
  2 => 'DevOps'
];
 //var_dump($jobs[2]);
$jobs1 = [
  [
    'title' => 'PHP Developer',
    'description' => 'Full Stack Developer',
    'visible' => 'true'
  ],
  [
    'title' => 'Python Developer'
  ],
  [
    'title' => 'DevOps'
  ],
  [
    'title' => 'Go Developer'
  ],
  [
    'title' => 'Frontend Dev'
  ]
];
*/
