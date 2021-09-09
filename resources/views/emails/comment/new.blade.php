@component('mail::message')
# {{ __('email.Review') }} "{{ $comment->review->title }}" {{ __('email.receive a new comment') }}

## {{ __('email.Comment by') }} : {{ $comment->user->name }}
@component('mail::panel')
{{ $comment->body }}
@endcomponent

@component('mail::button', ['url' => $url, 'color' => 'success'])
{{ __('View Review') }}
@endcomponent

@endcomponent
