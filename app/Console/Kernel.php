<?php

namespace App\Console;

use App\Enums\CartStatus;
use App\Exports\CartsExport;
use App\Jobs\MonthlyReportJob;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *->lastDayOfMonth('23:59')
     *->everyMinute()
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Excel::store(new CartsExport,'accepted-request'.Carbon::now().'xlsx');
            DB::table('cart')->where('status',CartStatus::DONE)->delete();
        })->everyMinute()
        ->before(function () {
            dispatch(new MonthlyReportJob);
        })
        ->name("Monthly Request Delete")
        ->emailOutputTo(env('MAIL_TO'));
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
