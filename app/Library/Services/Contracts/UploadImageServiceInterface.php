<?php
namespace App\Library\Services\Contracts;
  
Interface UploadImageServiceInterface
{
    public function uploadImage($request,$data,$type);
}