

@component('mail::message')
# Hi {{ $User }} Looks like its time for {{ $mealtime }}.
The body of your message.
@component('mail::button', ['url' => 'Link'])
more Details
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent