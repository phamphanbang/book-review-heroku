<?php

namespace App\Observers;

use App\Models\Book;
use App\Models\User;
use App\Notifications\BookNotification;
use Illuminate\Support\Facades\Notification;
use App\Enums\NotificationAction;

class BookObserver
{
    public function created(Book $book)
    {
        $this->SendNotification($book,NotificationAction::CREATED);
    }

    public function updated(Book $book)
    {
        $this->SendNotification($book,NotificationAction::UPDATED);
    }

    public function deleted(Book $book)
    {
        $this->SendNotification($book,NotificationAction::DELETED);
    }


    private function SendNotification(Book $book,$action) {
        $users = User::all();
        $by_user = auth()->user();
        Notification::send($users , new BookNotification($book,__('message.'.$action),$by_user));
    }
}
