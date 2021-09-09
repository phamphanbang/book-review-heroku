<?php

namespace App\Mail;

use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceiveReview extends Mailable
{
    use Queueable, SerializesModels;

    public $review,$url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
        $this->url = url('/review/'.$review->id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'),__('email.New review on').$this->review->book->title)
        ->markdown('emails.review.new');
    }
}
