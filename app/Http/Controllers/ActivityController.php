<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Enums\FavoriteStatus;
use App\Enums\ReadStatus;
use App\Enums\ActivityTypeEnum;
use App\Models\ActivityType;
use App\Models\User;
use App\Library\Services\Contracts\ActivityServiceInterface;

class ActivityController extends Controller
{

    protected $activityService;

    public function __construct(ActivityServiceInterface $activityServiceInterface)
    {
        $this->activityService = $activityServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user_id = auth()->user()->id;
        $data["activity"] = new Activity;
        $data["activity"]->book_id = $request->book_id;
        $data["activity"]->user_id = $user_id;
        $last_activity = Activity::where('user_id',$user_id)->where('book_id',$request->book_id)->latest('time')->first();
        if($last_activity){
            $data["activity"]->read_status = $last_activity->read_status;
            $data["activity"]->favorite_status = $last_activity->favorite_status;
        }
        else {
            $data["activity"]->read_status = ReadStatus::NONE;
            $data["activity"]->favorite_status = FavoriteStatus::NONE;
        }
        $this->activityService->statusController($data["activity"],$request->activity);
        $data["activity"]->time = Carbon::now();
        $data["activity"]->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["user"] = User::find($id);
        $data["activity"] = Activity::where('user_id',$id)->orderBy('time','desc')->paginate(10);
        return view('users.profile.timeline')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

}
