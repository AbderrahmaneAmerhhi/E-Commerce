@component('mail::message')

<h1>{{$details['title']}}</h1>
<p>{{$details['body']}}</p>
@component('mail::button', ['url' => 'http://first:8000/'])
Visit Site
@endcomponent

Thanks You,<br>
{{ config('app.name') }}
@endcomponent
