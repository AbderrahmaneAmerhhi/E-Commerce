@extends('layouts.sidebar')

@section('content')
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="row">
                    <div class="col-md-12">

                           <div class="div-header d-flex flex-row justify-content-between align-item-center border-bottom p-2">
                              <h3>
                                  <i class="fas fa fa-comment"></i> Comments
                              </h3>


                           </div>
                                <table class="table table-responsive-sm table-hover">
                                    <thead>
                                        <tr>
                                           <th>#Id</th>
                                           <th>Comment</th>
                                           <th>User</th>
                                           <th>Product</th>
                                           <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                         @foreach ($comments as $comment)
                                            <td>{{$comment->id}}</td>
                                            <td>{{Str::limit($comment->comment,50)}}</td>
                                            <td>{{$comment->user->name}}</td>
                                            <td>{{$comment->item->title}}</td>
                                           <td class="d-flex f-row justify-content-center align-items-center">

                                                @if ($comment->status===0)
                                                <form  id="{{$comment->id}}"
                                                    action="{{route("Comment.update",$comment->id)}}"
                                                    method="Post">
                                                    @csrf
                                                    @method("PUT")
                                                  <button
                                                  onclick="event.preventDefault();
                                                  document.getElementById({{$comment->id}}).submit();"
                                                   class="btn btn-primary btn-sm ml-2" >
                                                    <i class="fa fa-check"></i>
                                                  </button>
                                                </form>
                                                @endif

                                                <form id="{{$comment->id}}" action="{{route("Comment.destroy",$comment->id)}}" method="POST">
                                                @csrf
                                                 @method("DELETE")
                                                 <button
                                                 class="btn btn-danger btn-sm ml-2"
                                                  onclick="event.preventDefault();
                                                 if(confirm('Do you want to delete {{$comment->user->name}}\'s comment  ??')){
                                                    document.getElementById('{{$comment->id}}').submit();
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

                                               {{-- Pagination--}}

                                 <div class="justify-content-center d-flex">
                                    {{$comments->links("pagination::bootstrap-4")}}
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
