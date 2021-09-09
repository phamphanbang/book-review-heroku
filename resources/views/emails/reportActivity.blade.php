@component('mail::message')
# {{ __('email.Report on inappropriate activity') }}


## {{ __('email.Type of subject') }} : {{ $subject_type }}
## {{ __('email.From User') }} : {{ $to_subject->user->name }}
@component('mail::panel')
{{ $to_subject->body }}
@endcomponent

@component('mail::button', ['url' => $link_to_subject, 'color' => 'success'])
{{ "Link to subject" }}
@endcomponent

@endcomponent