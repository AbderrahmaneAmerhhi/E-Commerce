{{-- Error alert --}}
@if ($errors->all())

 @foreach ($errors->all() as $er)
 <div class="error-Message msj"  id="nice">
    <strong>{!! $er !!}</strong>
    <button type="button" id="close">
     <span>&times;</span>
   </button>

 </div>

 @endforeach

 @endif

 {{-- Success messaje --}}
@if (session()->has("success"))

<div class="nice-Message msj"  id="nice">
   <strong>{{session()->get("success")}}</strong>
   <button type="button" id="close">
    <span>&times;</span>
  </button>

</div>


@endif

{{-- info alert --}}

@if (session()->has('info'))
<div class=" info-Message msj"  id="nice">
    <strong>{{session()->get('info')}}</strong>
    <button type="button" id="close">
     <span>&times;</span>
   </button>

 </div>

@endif

{{-- Email success Messaje--}}

@if (session()->has('success-mail'))
<div class=" info-Message msj"  id="nice">
    <strong>{{session()->get('success-mail')}}</strong>
    <button type="button" id="close">
     <span>&times;</span>
   </button>

 </div>

@endif
