@extends('layouts.sidebar')

@section('content')
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="row">
                    <div class="col-md-12">

                           <div class="div-header d-flex flex-row justify-content-between align-item-center border-bottom p-2">
                              <h3>
                                  <i class="fas fa fa-list"></i> Categories
                              </h3>

                              <a href="{{route("category.create")}}" class="btn btn-primary">
                                  <i class="fas fa fa-plus"></i>
                              </a>
                           </div>
                                <table class="table table-responsive-sm table-hover">
                                    <thead>
                                        <tr>
                                           <th>#Id</th>
                                           <th>Title</th>
                                           <th>Visibility</th>
                                           <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($cats as $cat)
                                            <td>{{$cat->id}}</td>
                                            <td>{{$cat->title}}</td>
                                            <td>
                                                @if ($cat->visibility)
                                                <i class="fa fa-check text-success"></i>

                                                @else
                                                <i class="fa fa-times text-danger"></i>

                                                @endif
                                            </td>
                                            <td class="d-flex f-row justify-content-center align-items-center">
                                                <a href="{{route("category.edit",$cat->slug)}}" class="btn btn-success btn-sm" >
                                                 <i class="fas fa fa-edit"></i>
                                                </a>

                                                <form id="{{$cat->id}}" action="{{route("category.destroy",$cat->slug)}}" method="POST">
                                                @csrf
                                                 @method("DELETE")
                                                 <button
                                                 class="btn btn-danger btn-sm ml-2"
                                                  onclick="event.preventDefault();
                                                 if(confirm('Would you like Delete a Category {{$cat->title}} ??')){
                                                    document.getElementById('{{$cat->id}}').submit();
                                                 }
                                                 ">
                                                       <i class="fa fa-trash"></i>
                                                 </button>
                                               </form>

                                            </td>




                                        </tr>
                                    </tbody>
                                     @endforeach
                                  </table>

                                               {{-- Pagination --}}

                                 <div class="justify-content-center d-flex">
                                    {{$cats->links("pagination::bootstrap-4")}}
                                 </div>

                 </div>
                 
               </div>

           </div>
       </div>
   </div>

@endsection
@section('javascript')
  <script>
      //
    var Msj=document.getElementsByClassName("msj")
    var btnclose=document.getElementById("close");
    btnclose.onclick=function(){
        for(c=0;c<Msj.length;c++){
            Msj[c].style.display = "none";

        }

    }
  </script>
@endsection
