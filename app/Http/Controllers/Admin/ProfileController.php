<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Library\Services\Contracts\UploadImageServiceInterface; 


class ProfileController extends Controller
{

    protected $uploadImageService;

    public function __construct(UploadImageServiceInterface $uploadImageServiceInterface)
    {
        $this->uploadImageService = $uploadImageServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $user = User::find(Auth::user()->id);
        $user = $this->findProfile(Auth::user()->id);
        return view('admin.profile.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($profileid)
    {
        //
        $user = $this->findProfile(Auth::user()->id);
        return view('admin.profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profileid)
    {
        //
        $user = $this->findProfile(Auth::user()->id);
        $data = $request->all();
        $type = 'profile';
        $data['image'] = $this->uploadImageService->uploadImage($request,$data,$type);

        $user->update($data);
        if($user){
            $message = 'message.update_profile_success';
            return redirect()->route('profileadmin.edit',[$user->id])->withMessage(__($message));
        } else {
            $message = 'message.update_profile_fail';
            return redirect()->route('profileadmin.edit',[$user->id])->withMessage(__($message));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function findProfile($profileId){
        $user = User::find($profileId);
        if($user){
            return $user;
        }else{
            $errors = 'message.no_profile';
            return redirect()->route('homeadmin.index')->withErrors(__($errors));
        }
    }
}
