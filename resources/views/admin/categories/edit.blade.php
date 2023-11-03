@extends('layouts.sidebar')

@section('content')
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="row">
                   <div class="col-sm-12 ">
                     <div class="card p-3">
                         <div class="card-title border-bottom">
                             <h3><i class="fas fa fa-edit"></i> Edit Category</h3>
                         </div>
                         <div class="card-body">
                           <form action="{{route("category.update",$cat->slug)}}" method="POST">
                               @csrf
                               @method("PUT")
                                    <div class="row mb-3">
                                        <label for="title" class="col-md-2 col-sm-3 form-label">Title :</label>
                                        <div class="col-md-10 col-sm-9">
                                        <input type="text"
                                        name="title"
                                        id="title"
                                        class="form-control"
                                        value="{{$cat->title}}"
                                        >
                                        </div>
                                    </div>

                                    <div class="col-sm-10 mb-3">
                                        <div class="form-check">
                                        <input class="form-check-input " type="radio"
                                            name="visibility" id="non_visible"
                                            value="0"
                                            @if ($cat->visibility===0)
                                            checked
                                            @endif

                                            aria-label="Radio button for following text input"
                                            >
                                        <label class="form-check-label" for="non_visible">
                                            Non visible
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input"
                                         type="radio"
                                          name="visibility"
                                           id="visible"
                                           @if ($cat->visibility===1)
                                           checked
                                           @endif
                                            value="1">
                                        <label class="form-check-label" for="visible">
                                            Visible
                                        </label>
                                        </div>
                                    </div>


                                <div class="mb-3">
                                    <input type="submit" value="Send" class="btn btn-primary">
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
