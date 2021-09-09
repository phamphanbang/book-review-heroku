@component('mail::message')
# {{ __('email.Book') }} "{{ $review->book->title }}" {{ __('email.receive a new review') }}

## {{ __('email.Title') }} : {{ $review->title }}
@component('mail::panel')
{{ $review->body }}
@endcomponent

@component('mail::button', ['url' => $url, 'color' => 'success'])
{{ __('email.View Review') }}
@endcomponent

@endcomponent