<?php
namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as valid;
use Zend\Diactoros\Response\RedirectResponse;


class AuthController extends BaseController{

  public function getLogin(){
    return $this->renderHTML('login.twig');
  }

  public function postLogin($request){
    $postData = $request->getParsedBody();
    $responseMessage = null;

    //Validation here

    $user = User::where('email',$postData['email'])->first();
    if($user){
      if (\password_verify($postData['password'], $user->password)){
        return new RedirectResponse('/php_2/admin');
      }else{
        $responseMessage = 'Bad Credentials';
      }
    }else{
      $responseMessage = 'Bad Credentials';
    }
    return $this->renderHTML('login.twig',[
      'responseMessage' => $responseMessage
    ]);
  }

}
