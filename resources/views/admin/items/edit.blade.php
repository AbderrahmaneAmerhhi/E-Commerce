@extends('layouts.sidebar')

@section('content')
<script>
 if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
     }
</script>
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="row">
                   <div class="col-sm-12 ">
                     <div class="card p-3">
                         <div class="card-title border-bottom">
                             <h3><i class="fa fa-tshirt"></i>Edit the Product {{$item->title}}</h3>
                         </div>
                         <div class="card-body">
                             <form action="{{route("item.update",$item->slug)}}" method="POST" enctype="multipart/form-data">
                               @csrf
                               @method("PUT")
                               <div class="row mb-3">
                                   <label for="title" class="col-md-2 col-sm-3 form-label">Title :</label>
                                   <div class="col-md-10 col-sm-9">
                                    <input type="text"
                                    name="title"
                                    id="title"
                                    class="form-control"
                                     value="{{$item->title}}"
                                    >
                                   </div>
                                </div>
                                {{-- Description input --}}

                                <div class="row mb-3">
                                    <label for="desc" class="col-md-2 col-sm-3 form-label">Description :</label>
                                    <div class="col-md-10 col-sm-9">
                                     <textarea name="description" id="desc" cols="30" rows="9"
                                     class="form-control" >{{$item->description}}</textarea>

                                    </div>
                                </div>
                                     {{-- end discription --}}
                                {{-- start price input --}}
                                    <div class="input-group mt-3 mb-3">
                                        <label for="price" class="col-md-2 col-sm-3 form-label">Price :</label>
                                        <input type="number" class="form-control"
                                        id="price"
                                         name="price"
                                         value="{{$item->price}}">
                                         <span class="input-group-text">MAD</span>
                                         <span class="input-group-text">0.00</span>
                                    </div>
                                {{-- end price input --}}
                                        {{-- start price input --}}
                                        <div class="input-group mt-3 mb-3">
                                            <label for="old-price" class="col-md-2 col-sm-3 form-label">Old Price :</label>
                                            <input type="number" class="form-control"
                                            id="old-price"
                                            name="Old_price"
                                            value="{{$item->Old_price}}">
                                            <span class="input-group-text">MAD</span>
                                            <span class="input-group-text">0.00</span>
                                        </div>
                                        {{-- end price input --}}

                                     {{-- In stock  --}}

                                <div class="col-sm-10 mb-3">
                                    <div class="form-check">
                                      <input class="form-check-input " type="radio"
                                       name="in_Stock" id="non_dispo"
                                       {{$item->in_Stock===0?"checked":""}}
                                       value="0"
                                       aria-label="Radio button for following text input"
                                       >
                                      <label class="form-check-label" for="non_dispo">
                                       Products Non Disponible in Stock
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input"
                                      type="radio" name="in_Stock" id="dispo" value="1"
                                      {{$item->in_Stock===1?"checked":""}}
                                      >
                                      <label class="form-check-label" for="dispo">
                                      Product Disponible in Stock
                                      </label>
                                    </div>
                                </div>
                                {{-- end in stock --}}

                            {{-- Start Qte--}}
                            <div class="row mb-3">
                                <label for="qte" class="col-md-2 col-sm-3 form-label">Quantity :</label>
                                <div class="col-md-10 col-sm-9">
                                 <input type="number"
                                 name="Qte"
                                 id="qte"
                                 class="form-control"
                                 value="{{$item->Qte}}"
                                 >
                                </div>
                             </div>

                                {{-- end qte --}}
                                    {{-- Country mad --}}
                                    <div class="row mb-3">
                                        <label for="cm" class="col-md-2 col-sm-3 form-label">Country Mad :</label>
                                        <div class="col-md-10 col-sm-9">
                                        <input type="text"
                                        name="Country_Mad"
                                        id="cm"
                                        class="form-control"
                                        value="{{$item->Country_Mad}}"
                                        >
                                        </div>
                                    </div>

                                        {{-- end country mad --}}
                                         {{-- start image product --}}

                                        <div class="input-group mb-3">
                                            <label for="inputGroupFile02" class="col-md-2 col-sm-3 form-label">Product Image :</label>
                                            <input type="file" class="form-control" id="inputGroupFile02" name="image">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                          </div>
                                      {{--     end  product image --}}
                                      {{-- start category  --}}
                                      <div class="input-group mb-3">
                                        <label for="cat" class="col-md-2 col-sm-3 form-label">Product Category :</label>
                                        <select name="category_id" id="cat" class="form-control">
                                            @foreach ($cats as $cat)
                                            <option value="{{$cat->id}}"
                                            @if ($item->cat_id === $cat->id)
                                            selected
                                            @endif  >{{$cat->title}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      {{-- end category  --}}

                                </div>

                                <div class="mb-3">
                                    <input type="submit" value="Edit" class="btn btn-primary">
                                </div>

                            </form>
                         </div>
                     </div>
                   </div>

               </div>

           </div>
       </div>
   </div>

@endsection
