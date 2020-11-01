<?php
namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as valid;

class UsersController extends BaseController{
  public function getAddUserAction($request){
       $responseMessage = null;

       if ($request->getMethod() == 'POST') {
           $postData = $request->getParsedBody();
           $userValidator = valid::key('email', valid::stringType()->notEmpty())
                 ->key('password', valid::stringType()->notEmpty());

           try {
               $userValidator->assert($postData);
               $postData = $request->getParsedBody();

               $user = new User();
               $user->email = $postData['email'];
               $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);
               $user->save();

               $responseMessage = 'Saved';
           } catch (\Exception $e) {
               $responseMessage = $e->getMessage();
               // $responseMessage = "Campos vacíos";
           }
       }

       return $this->renderHTML('signup.twig', [
           'responseMessage' =>$responseMessage
       ]);
  }
}
