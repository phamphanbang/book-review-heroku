<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    public function follow($userId, $followId){
        $follow = Follow::FollowUser($userId, $followId)->first();
        if($follow){
            $message = 'message.now_follow';
            return redirect('listuser')->withMessage(__($message));
        }else{
            $data["follow"] = new Follow;
            $data["follow"]->user_id = $userId;
            $data["follow"]->follow_id = $followId;
            $data["follow"]->save();
            $message = 'message.follow_success';

            return redirect()->route('listuser')->withMessage(__($message));
        } 
    }

    public function unfollow($userId, $followId){
        $follow = Follow::FollowUser($userId, $followId)->first();
        if($follow){
            $follow->delete();
            $message = 'message.unfollow_success';
            return redirect()->route('listuser')->withMessage(__($message));
        }else{
            $message = 'message.no_follow';
            return redirect()->route('listuser')->withMessage(__($message));

        } 
    }
}
