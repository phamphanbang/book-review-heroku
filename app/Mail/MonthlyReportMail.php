<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Exports\CartAllExport;
use App\Exports\RevenueExport;

class MonthlyReportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $cart_report_name = __('email.monthly-request-report-').Carbon::now()->format('Y-m-d').'.xlsx';
        $revenue_report_name = __('email.monthly-revenue-report-').Carbon::now()->format('Y-m-d').'.xlsx';
        Excel::store(new CartAllExport("month"), $cart_report_name);
        Excel::store(new RevenueExport("month"), $revenue_report_name);
        $cart_export_location = storage_path('app/'.$cart_report_name);
        $revenue_export_location = storage_path('app/'.$revenue_report_name);
        return $this->from(env('MAIL_FROM_ADDRESS'),__('email.Monthly Report'))->with('time',Carbon::now()->format('Y-m-d h:m:s'))
        ->attach($cart_export_location)
        ->attach($revenue_export_location)
        ->markdown('emails.report');
    }
}
