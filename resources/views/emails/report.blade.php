@component('mail::message')
# {{ __('email.Monthly Report') }}

@component('mail::panel')
{{ __('email.Monthly Report Content',['time' => $time]) }}
@endcomponent

@endcomponent