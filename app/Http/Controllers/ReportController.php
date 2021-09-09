<?php

namespace App\Http\Controllers;

use App\Jobs\ReportJob;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(Request $request,$userId) {
        $data['from_user'] = $userId;
        $data['to_subject'] = $request->subjectId;
        $data['subject_type'] = $request->reportType;
        $data['link_to_subject'] = $request->link_to_subject;
        dispatch(new ReportJob($data));
        return response()->json(['message' => __('message.report success')]);
    }
}
