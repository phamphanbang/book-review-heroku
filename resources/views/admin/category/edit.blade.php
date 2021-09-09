@extends('admin.layout.index')
@section('content1')
<div class="row">
   <div class="col-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">{{__('message.Edit_Category')}}</h4>
            <p class="card-description">
               {{__('message.Edit_Category')}}
            </p>
            <form class="forms-sample" method="post" action="{{route('category.update',[$category->id])}}">
               @method('PUT')
               <div class="form-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="categoryid" value="{{$category->id}}">
                  <label for="exampleInputName1">{{__('message.Name_Category')}}</label>
                  <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="{{$category->title}}" value="{{$category->title}}">
               </div>
               <div class="form-group">
                  <label for="parent">{{ __('message.BelongToCategory') }}</label>
                  <label style="display: block" for="parent">
                     {!! categoryBelongTo($category) !!}   
                  </label>
                  <select class="form-control" name="parent_id" id="categorySelect2">
                     <option value="0" >{{ __('message.CategoryNone') }}</option>
                     @foreach($categories as $item)
                     @if ($item->id != $category->id)
                     <option value="{{$item->id}}" {{$item->id==$category->parent_id ?'selected':''}}>{{$item->title}}</option>
                     @endif
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleTextarea1">{{__('message.Description')}}</label>
                  <textarea class="form-control" name="description" placeholder="{{$category->description}}" id="exampleTextarea1" rows="4">{{$category->description}}</textarea>
               </div>
               <button type="submit" class="btn btn-primary mr-2">{{__('message.submit')}}</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection