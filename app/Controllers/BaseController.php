<?php
namespace App\Controllers;
use \Twig\Loader\FilesystemLoader;
/**
 *
 */
class BaseController {
  protected $templateEngine;

  public function __construct()
  {
      $loader = new \Twig\Loader\FilesystemLoader('../views');
      $this->templateEngine = new \Twig\Environment($loader, array(
          'debug' => true,
          'cache' => false
      ));
  }
  public function renderHTML($fileName, $data = []) {
        return $this->templateEngine->render($fileName, $data);
    }
}
