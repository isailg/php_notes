<?php

use App\Models\{Job,Project};


$jobs = Job::all();

$project1 = new Project ('Project1','Description1');



$projects = [
  $project1 ];

function printElement( $job){
  // if ($job->visible == false){
  //   return;
  // }
  echo '<li class="work-position">';
  echo '<h5>' . $job->title . '</h5>';
  echo '<p>' . $job->description . ' </p>';
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
