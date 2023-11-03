@extends('layouts.app')

@section('content')
<div class="container " style="margin-top: 100px">
    <div class="row justify-content-center">

        {{-- Go to product index in admin panel --}}
        <div class="col-md-3">
            <a href="{{route("item.index")}}"  style="text-decoration: none">
                 <div class="card bg-primary text-white">
                     <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h3> Products </h3>
                     <span class="font-weight-bold">
                         {{$items->count()}}
                     </span>
                     </div>
                 </div>
            </a>

        </div>

        {{-- Go to categoris index in admin panel --}}
        <div class="col-md-3">
            <a href="{{route("category.index")}}" style="text-decoration: none">
                 <div class="card bg-danger text-white">
                     <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h3> Categories </h3>
                     <span class="font-weight-bold">
                         {{$cats->count()}}
                     </span>
                     </div>
                 </div>
            </a>

        </div>

          {{-- Go to order index in admin panel --}}
        <div class="col-md-3">
            <a href="{{route("order.index")}}" style="text-decoration: none">
                 <div class="card bg-warning text-white">
                     <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h3> Orders </h3>
                     <span class="font-weight-bold">
                         {{$orders->count()}}
                     </span>
                     </div>
                 </div>
            </a>

        </div>

         {{-- Go to comments index in admin panel --}}
        <div class="col-md-3">
            <a href="{{route("Comment.index")}}" style="text-decoration: none">
                 <div class="card text-white" style="background-color:#2ecc71 ">
                     <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h3> Comments </h3>
                     <span class="font-weight-bold">
                         {{$comments->count()}}
                     </span>
                     </div>
                 </div>
            </a>

        </div>

    </div>
</div>
@endsection

