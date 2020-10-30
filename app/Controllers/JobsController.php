<?php
namespace App\Controllers;

use App\Models\Job;
use Respect\Validation\Validator as valid;

class JobsController extends BaseController{
  public function getAddJobAction($request){
       $responseMessage = null;

       if ($request->getMethod() == 'POST') {
           $postData = $request->getParsedBody();
           $jobValidator = valid::key('title', valid::stringType()->notEmpty())
                 ->key('description', valid::stringType()->notEmpty());

           try {
               $jobValidator->assert($postData);
               $postData = $request->getParsedBody();

               $files = $request->getUploadedFiles();
                $logo = $files['logo'];

                if($logo->getError() == UPLOAD_ERR_OK) {
                    $fileName = $logo->getClientFilename();
                    $logo->moveTo("uploads/$fileName");
                }
               // $job = new Job();
               // $job->title = $postData['title'];
               // $job->description = $postData['description'];
               // $job->save();

               $responseMessage = 'Saved';
           } catch (\Exception $e) {
               $responseMessage = $e->getMessage();
               // $responseMessage = "Campos vacíos";
           }
       }

       return $this->renderHTML('addJob.twig', [
           'responseMessage' =>$responseMessage
       ]);
  }
}
