<?php
namespace App\Library\Services\Contracts;
  
Interface UserServiceInterface
{
    public function changeImage($request,$id);

    public function searchBy($search,$searh_by);

    public function reviewOnBook($book_id);
}