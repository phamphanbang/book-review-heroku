<?php

namespace App\Library\Services;
use Illuminate\Support\Str;

use App\Library\Services\Contracts\UploadImageServiceInterface;

class UploadImageService implements UploadImageServiceInterface {

    public function uploadImage($request,$data,$type)
    {
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            switch($type){
                case 'book':
                    $destinationPath = storage_path('public/upload/book');
                    while(file_exists($destinationPath.$image))
                    {
                        $image = Str::random(4)."_".$name;
                    }
                    $file->move($destinationPath,$image);
                    return $data['image'] = $image;
                    break;
                case 'profile':
                    $destinationPath = storage_path('public/upload/user');
                    $image = $request->user()->id . '.' . $file->clientExtension();
                    $file->move($destinationPath,$image);
                    return $data['image'] = $image;
                    break;
                default:
                    return $data['image'] = null; 
            }
        }
        else
        {
            return $data['image'] = 'default.jpg';
        }
    }

}