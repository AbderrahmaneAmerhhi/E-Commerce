@extends('layouts.sidebar')

@section('content')
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="row">
                    <div class="col-md-12">

                           <div class="div-header d-flex flex-row justify-content-between align-item-center border-bottom p-2">
                              <h3>
                                  <i class="fas fa fa-tshirt"></i> Products
                              </h3>

                              <a href="{{route("item.create")}}" class="btn btn-primary">
                                  <i class="fas fa fa-plus"></i>
                              </a>
                           </div>

                                <table class="table table-responsive-sm table-hover">
                                    <thead>
                                        <tr>

                                           <th>#Id</th>
                                           <th>Title</th>
                                           <th>Description</th>
                                           <th>price</th>
                                           <th>Old price</th>
                                           <th>in Stock</th>
                                           <th>Qte</th>
                                           <th>Country Mad</th>
                                           <th>image</th>
                                           <th>Category </th>
                                           <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            @foreach ($items as $item)
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{Str::limit($item->description,50)}}  </td>
                                            <td>{{$item->price}} DH</td>
                                            <td>{{$item->Old_price}} DH</td>
                                            <td>{{$item->in_Stock>0?"Disponible":"Non Disponible"}}</td>
                                            <td>{{$item->Qte}}</td>
                                            <td>{{$item->Country_Mad}}</td>
                                            <td>
                                                <img src="images/items/{{$item->image}}" alt="{{$item->title}}"
                                                class="img-fluid rounded-circle"
                                                width="70"
                                                height="70"
                                                >
                                            </td>

                                            <td>
                                             {{$item->category->title}}

                                            </td>
                                            <td class="d-flex f-row justify-content-center align-items-center">
                                                <a href="{{route("item.edit",$item->slug)}}" class="btn btn-success btn-sm" >
                                                 <i class="fas fa fa-edit"></i>
                                                </a>

                                                <form id="{{$item->id}}" action="{{route("item.destroy",$item->slug)}}" method="POST">
                                                @csrf
                                                 @method("DELETE")
                                                 <button
                                                 class="btn btn-danger btn-sm ml-2"
                                                  onclick="event.preventDefault();
                                                 if(confirm('Would you like Delete The Product {{$item->title}} ??')){
                                                    document.getElementById('{{$item->id}}').submit();
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
                                    {{$items->links("pagination::bootstrap-4")}}
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
