<?php

namespace App\Library\Services;

use App\Library\Services\Contracts\UserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService implements UserServiceInterface
{
    public function changeImage($request,$id)
    {
        $destinationPath = storage_path('public/upload/user');
        $file = $request->file('image');
        $fileName = $id . '.' . $file->clientExtension();
        $file->move($destinationPath, $fileName);
        return $fileName;
    }

    public function searchBy($search, $search_by)
    {
        if ($search_by == "role") {
            $users = User::role($search)->paginate(5);
        }
        else {
            $users = User::where($search_by,'like','%'.$search.'%')->paginate(5);
        }
        return $users;
    }

    public function reviewOnBook($book_id)
    {
        $users = DB::table('users')->join('review','users.id','=','review.user_id')
            ->join('book','book.id','=','review.book_id')
            ->groupBy('users.id')->get();
        return $users;
    }
}
