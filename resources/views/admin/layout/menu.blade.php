<nav class="sidebar sidebar-offcanvas" id="sidebar">
   <ul class="nav">
      <li class="nav-item">
         <a class="nav-link" href="{{route('homeadmin.index')}}">
         <i class="fas fa-th-large menu-icon"></i>
         <span class="menu-title">{{__('message.Home')}}</span>
         </a>
      </li>
      @can('crud category')
      <li class="nav-item">
         <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="fas fa-bookmark menu-icon"></i>
         <span class="menu-title">{{__('message.Category_Book')}}</span>
         <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">{{__('message.List_Category')}}</a></li>
               <li class="nav-item"> <a class="nav-link" href="{{route('category.create')}}">{{__('message.Add_Category')}}</a></li>
            </ul>
         </div>
      </li>
      @endcan
      @can('crud book')
      <li class="nav-item">
         <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
         <i class="fas fa-book menu-icon"></i>
         <span class="menu-title">{{__('message.Books')}}</span>
         <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
               <li class="nav-item"><a class="nav-link" href="{{route('bookadmin.index')}}">{{__('message.List_Book')}}</a></li>
               <li class="nav-item"><a class="nav-link" href="{{route('bookadmin.create')}}">{{__('message.Add_Book')}}</a></li>
            </ul>
         </div>
      </li>
      @endcan
      <li class="nav-item">
         <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
            <i class="fas fa-user-circle menu-icon"></i>
         <span class="menu-title">{{__('message.Profiles')}}</span>
         <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="charts">
            <ul class="nav flex-column sub-menu">
               <li class="nav-item"><a class="nav-link" href="{{route('profileadmin.index')}}">{{__('message.User_Profile')}}</a></li>
               <li class="nav-item"><a class="nav-link" href="{{route('profileadmin.edit',[auth()->user()->id])}}">{{__('message.Edit_Profile')}}</a></li>
            </ul>
         </div>
      </li>
      @can('crud user')
      <li class="nav-item">
         <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
         <i class="fas fa-users menu-icon"></i>
         <span class="menu-title">{{__('message.Users')}}</span>
         <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
               <li class="nav-item"><a class="nav-link" href="{{route('user.index')}}">{{__('message.List_User')}}</a></li>
               <li class="nav-item"><a class="nav-link" href="{{route('user.create')}}">{{__('message.Add_Users')}}</a></li>
            </ul>
         </div>
      </li>
      @endcan
      @can('crud role')
      <li class="nav-item">
         <a class="nav-link" data-toggle="collapse" href="#role" aria-expanded="false" aria-controls="role">
         <i class="fas fa-user-tag menu-icon"></i>
         <span class="menu-title">{{__('message.Role')}}</span>
         <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="role">
            <ul class="nav flex-column sub-menu">
               <li class="nav-item"><a class="nav-link" href="{{route('role.index')}}">{{ __('message.List_Role') }}</a></li>
               <li class="nav-item"><a class="nav-link" href="{{route('role.create')}}">{{ __('message.Add_Role') }}</a></li>
            </ul>
         </div>
      </li>
      @endcan
      @can('crud permissions')
      <li class="nav-item">
         <a class="nav-link" href="{{route('permission.index')}}" >
         <i class="fas fa-pen-nib menu-icon"></i>
         <span class="menu-title">{{__('message.Permissions')}}</span>
         </a>
      </li>
      @endcan
      @can('crud tag')
      <li class="nav-item">
         <a class="nav-link" href="{{route('tag.index')}}" >
         <i class="fas fa-tags menu-icon"></i>
         <span class="menu-title">{{__('message.Tag')}}</span>
         </a>
      </li>
      @endcan
      @can('resolve request')
      <li class="nav-item">
         <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
            <i class="fas fa-shopping-cart menu-icon"></i>
         <span class="menu-title">{{__('message.Manager_Checkout')}}</span>
         <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="icons">
            <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="{{route('cart.index')}}">{{__('message.List_Checkout')}}</a></li>
            </ul>
         </div>
      </li>
      @endcan
   </ul>
</nav>
