<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeImageRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\Library\Services\Contracts\UserServiceInterface;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangeController extends Controller
{

    protected $userService;

    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userService = $userServiceInterface;
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(auth()->user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', __('message.changePasswordFail'));
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', __('message.changePasswordSuccess'));
    }

    public function changeImage(ChangeImageRequest $request){
        if( $request->hasFile('image') ) {
            $user_id = auth()->user()->id;
            $fileName = $this->userService->changeImage($request,$user_id);
            $user = User::find($user_id);
            $user->image = $fileName;
            $user->save();
            return back()->with('imgChangeSuccess',__('message.imgChangeSuccess'));
        }
        else {
            return back()->with('imageError',__('message.imgChangeFail'));
        }
    }
}
