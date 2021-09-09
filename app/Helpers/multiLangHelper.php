<?php

function langCurency($quantity , $price , $lang)
{
    if($lang=='vi') {
        return $quantity*$price*22000;
    }
    return $quantity*$price;
}

function langTypeOfCurency($lang) {
    if($lang=='vi') {
        return ' vnd';
    }
    return ' $';
}

function langTime($data,$lang)
{
    if ($lang=='vi') {
        $time = date('d/m/Y ', strtotime($data)) . __('message.at') . date(' H:i A ', strtotime($data));
        return $time;
    }
    $time = date('M d/Y ', strtotime($data)) . __('message.at') . date(' H:i A ', strtotime($data));
    return $time;
}

function hiddenSubject($subject,$type_of_subject) {
    $status = $subject->status=="hidden"?"normal":"hidden";
    $data ='<li><a><label class="cursor-pointer" for="'."toggleHidden-".$subject->id .'">';
    $data .=  $subject->status =="hidden"?__('message.Unhidden'):__('message.Hidden');
    $data .= '</label></a><input class="submit display_none"';
    $data .= 'id="'. "toggleHidden-".$subject->id .'" type="submit"'; 
    $data .= 'value="'.__('message.Delete').'" form="'."toggleHidden-subject".$subject->id .'">';
    if ($type_of_subject == "review") {
        $data .= '</li><form action="'.route('review.update',[$subject->id]).'" class="user display_none"';
    }
    else {
        $data .= '</li><form action="'.route('comment.update',[$subject->id]).'" class="user display_none"';
    }
    $data .= 'id="'."toggleHidden-subject".$subject->id .'" method="post">';
    $data .= '<input type="hidden" name="_token" value="'. csrf_token() .'">';
    $data .= '<input type="hidden" name="_method" value="PUT">';
    if($subject->title){
        $data .= '<input type="hidden" name="title" value="'.$subject->title.'">';
    }
    $data .= '<input type="hidden" name="body" value="'.$subject->body.'">';
    $data .= '<input type="hidden" name="status" value="'.$status.'"></form>';
    return $data;
}

