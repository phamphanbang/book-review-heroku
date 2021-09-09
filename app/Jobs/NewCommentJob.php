<?php

namespace App\Jobs;

use App\Mail\ReceiveComment;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class NewCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $comment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Redis::throttle('any_key')->allow(2)->every(10)->then(function () {
            $users = User::commentNotification($this->comment)->get();
            foreach ($users as $user) {
                $email = new ReceiveComment($this->comment);
                Mail::to($user->email)->queue($email);
            }
            $email = new ReceiveComment($this->comment);
            if ($this->comment->user->id != $this->comment->review->user->id) {
                Mail::to($this->comment->review->user->email)->queue($email);        
            }
        }, function () {
            return $this->release(2);
        });
    }
}
