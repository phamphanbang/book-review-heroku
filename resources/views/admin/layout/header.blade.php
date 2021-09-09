<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
   <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" href="{{url('admin/home')}}"><img src="{{ asset('admin/images/logo.svg') }}" class="mr-2" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="{{url('admin/home')}}"><img src="{{ asset('admin/images/logo-mini.svg') }}" alt="logo"/></a>
   </div>
   <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
         <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown" >
              <p class="mb-0 font-weight-normal float-left dropdown-header">{{ __('message.Notification') }}</p>
              @forelse ($user->notifications as $notification)
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">{{$notification->data['book'].$notification->data['action']}}</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                  {{$notification->data['by_user']}}
                  </p>
                </div>
              </a>
              @empty
              <a class="dropdown-item preview-item"></a>
              @endforelse
            </div>
          </li>
         <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            {{__('message.Language')}}
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
               <a class="dropdown-item" href="{{route('language.index',['en'])}}">
               English
               </a>
               <a class="dropdown-item" href="{{route('language.index',['vi'])}}">
               Việt Nam
               </a>
            </div>
         </li>
         <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="{{asset('/upload/user/'.Auth::user()->image)}}" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
               <a class="dropdown-item" href="{{route('admin.logout')}}">
               <i class="ti-power-off text-primary"></i>
               {{__('message.Logout')}}
               </a>
            </div>
         </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
      </button>
   </div>
</nav>
