<!--signup form popup-->
<div class="login-wrapper" id="signup-content">
   <div class="login-content">
      <a href="#" class="close">x</a>
      <h3>{{__('message.sign_up')}}</h3>
      <form method="post" action="{{ route('register') }}">
         @csrf
         <div class="row">
            <label for="username-2">
               {{__('message.Username')}}:
               <input type="text" name="name" id="username-2" placeholder="Hugh Jackman" required="required" />
            </label>
            @error('name')
            <span style="color: red" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
         <div class="row">
            <label for="email-2">
               {{__('message.Email_Address')}}:
               <input type="email" name="email" id="email-2" placeholder="user@gmail.com" required="required" />
            </label>
            @error('email')
            <span style="color: red" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
         <div class="row">
            <label for="password-2">
               {{__('message.Password')}}:
               <input type="password" name="password" id="password-2" placeholder="" required="required" />
            </label>
            @error('password')
            <span style="color: red" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
         <div class="row">
            <label for="repassword-2">
               {{__('message.Confirm_Password')}}:
               <input type="password" name="password_confirmation" id="repassword-2" placeholder=""
                  required="required" />
            </label>
            @error('password')
            <span style="color: red" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
         <div class="row">
            <button type="submit">{{__('message.sign_up')}}</button>
         </div>
      </form>
   </div>
</div>
<!--end of signup form popup-->