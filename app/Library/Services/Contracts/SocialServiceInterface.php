<?php
namespace App\Library\Services\Contracts;
  
Interface SocialServiceInterface
{
    public function redirectToProvider($driver);

    public function handleProviderCallback($driver,$redirectPath);

}