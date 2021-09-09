<?php

use App\Models\Category;

function rateform()
{
   $count = 11;
   for ($i = 1; $i < $count; $i++) {
      $input1 = '<input type="radio" name="rate" id="rate-' . $i . '" value="' . $count - $i . '">';
      $input2 = '<label for="rate-' . $i . '" class="fas fa-star"></label>';
      echo $input1 . "" . $input2;
   }
}
function oldrate($rate)
{
   for ($i = 10; $i >= 1; $i--) {
      if ($rate >= $i) {
         echo $input1 = '<label for="rate-' . $i . '" class="fas fa-star" style="color:#fd4"></label>';
      } else {
         echo $input2 = '<label for="rate-' . $i . '" class="fas fa-star"></label>';
      }
   }
}
function like($review)
{
   if (Auth::user()->isLikeReviews($review)) {
      echo __('message.is_like_review');
   } else {
      echo __('message.Like');
   }
}

function comment($comment)
{
   if (Auth::user()->isLikeComments($comment)) {
      echo __('message.is_like_comment');
   } else {
      echo __('message.Comments');
   }
}


function follow($user)
{
   if (Auth::user()->isFollowing($user)) {
      return __('message.Followed');
   } else {
      return __('message.Follow');
   }
}

function categorySubMenu($category)
{
   $data = '<li class="sub-li">' . '<a href="' . route('categoryuser.edit', [$category->id]) . '">' . $category->title;
   $data .= $category->children->count()>0?'<i class="fas fa-chevron-right"></i></a>':'</a>';
   if ($category->children) {
      $data .= '<ul >';
      foreach ($category->children as $child) {
         $data .= categorySubMenu($child);
      }
      $data .= '</ul>';
   }
   $data .= '</li>';
   return $data;
}

function categorybook()
{
   $categorys = Category::where('parent_id', 0)->get();
   $data = '';
   foreach ($categorys as $category) {
      $data .= '<li class="drp-li">';
      $data .= '<a href="' . route('categoryuser.edit', [$category->id]) . '">' . __('message.' . $category->title);
      $data .= $category->children->count()>0?'<i class="fas fa-chevron-right"></i></a>':'</a>';
      if ($category->children) {
         
         $data .= '<ul class="submenu">';
         foreach ($category->children as $child) {
            $data .= categorySubMenu($child);
         }
         $data .= '</ul>';
      }
      $data .= '</li>';
   }
   return $data;
}

$categoryBelongTo = [];

function categoryParent(Category $category)
{
   $data = '';
   if ($category->parent) {
      $data .= $category->parent->id .'-';
      $data .= categoryParent($category->parent);
   }
   return $data;
}

function categoryBelongTo(Category $category)
{
   $parent = explode('-',categoryParent($category));
   $category_id = array_reverse($parent);
   array_shift($category_id);
   $result ='';
   foreach ($category_id as $key => $item_id) {
      $result .= '<div class="category-button" id="'.$item_id.'">'.Category::find($item_id)->title.'</div>';
   }
   return $result;
}
