<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    public function index()
    {
        $data["tags"] = Tag::paginate(5);
        return view('admin.tag.list')->with('data', $data);
    }

    public function store(Request $request)
    {
        $tag = Tag::create(['name' => $request->name]);
        $data["tags"] = Tag::paginate(5);
        if ($tag) {
            return redirect()->route('tag.index')
                ->with('tagCreateSuccess', __('message.tagCreateSuccess'))
                ->with('data', $data);
        } else {
            return redirect()->route('tag.index')
                ->with('tagCreateFail', __('message.tagCreateFail'))
                ->with('data', $data);
        }
    }

    public function update(Request $request, $tagId)
    {
        $tag = Tag::find($tagId);
        $tag->name = $request->name;
        $check = $tag->save();
        $data["tags"] = Tag::paginate(5);
        if ($check) {
            return redirect()->route('tag.index')
                ->with('tagUpdateSuccess', __('message.tagUpdateSuccess'))
                ->with('data', $data);
        } else {
            return redirect()->route('tag.index')
                ->with('tagUpdateFail', __('message.tagUpdateFail'))
                ->with('data', $data);
        }
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        $data["tags"] = Tag::paginate(5);
        return redirect()->route('tag.index')
            ->with('tagDeleteSuccess', __('message.tagDeleteSuccess'))
            ->with('data', $data);
    }
}
