<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Review;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $from_user,$subject_type,$to_subject,$link_to_subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->from_user = User::find($data['from_user']);
        $this->subject_type = $data['subject_type'];
        if ($this->subject_type == 'review') {
            $this->to_subject = Review::find($data['to_subject']);
        }
        else {
            $this->to_subject = Comment::find($data['to_subject']);
        }
        $this->link_to_subject = $data['link_to_subject'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->from_user->email,__('email.Report on inappropriate activity').__('email.From User').$this->from_user->name)
        ->markdown('emails.reportActivity');
    }
}
