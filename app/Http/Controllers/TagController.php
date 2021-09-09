<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    public function show($tagName) {
        $books = Book::withAllTags([$tagName])->paginate(10);
        $tag = Tag::findFromString($tagName);
        $tag->count += 1 ;
        $tag->save();
        $total = count($books);
        $tags = Tag::orderBy('count','desc')->limit(20)->get();
        return view('users.book.search',compact('books','total','tags'));
    }
}
