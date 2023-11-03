@extends('layouts.app')

@section('content')


            <section class="home pt-3 overflow-hidden">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="home-banner home-banner-1">
                            <div class="home-banner-text">
                                <h2>Woman</h2>
                                <P><span style="color:#3b3b3b77">Special offers for</span> you woman</P>
                                <a href="/#products" class="btn btn-danger text-uppercase mt-4">Our Products</a>
                            </div>
                         </div>                      </div>
                      <div class="carousel-item">
                          <div class="home-banner home-banner-2">
                             <div class="home-banner-text">
                                 <h2>E-SHOP</h2>
                                 <P><span style="color:#3b3b3b77">You can pay by card </span>or using Paypal</P>
                                 <a href="/#products" class="btn btn-danger text-uppercase mt-4">Our Products</a>
                             </div>
                          </div>
                      </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true">
                          <span class="silder-icon">
                            <i class="fa fa-angle-left"></i>
                          </span>
                      </span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true">
                        <span class="silder-icon">
                            <i class="fa fa-angle-right"></i>
                        </span>
                      </span>
                    </button>
                  </div>
            </section>


            <section id="Show-product" class="Show-product mt-4 mb-5">
                <div class="container">
                    <div class="row ">
                      <div class="col-sm-12">
                         <div class="head text-center mb-5">
                             <h2 class="pb-2 position-relative d-inline-block">{{$item->title}}</h2>
                         </div>

                        </div>
                    </div>
                </div>

                <div class="show-product-info position-relative row col-sm-12 col-lg-12">

                    <div class="col-sm-12 col-12 col-lg-6">
                        <div class="show-product-image position-relative  ">
                            <img src="{{asset("images/items/".$item->image)}}" alt="{{$item->title}}" class="img-fluid">
                            @if ($item->Qte>0 && $item->in_Stock==1 )
                           <span class="despo-msj"> Disponible In Our Stock </span>
                            @else
                           <span class="non-despo-msj"> Non Disponible In Our Stock </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="product-info pt-3  ">
                            <h2 class="text-capitalize show-product-title" >{{$item->title}}</h2>
                            <hr>
                            <span class="mb-0 product-prix">{{$item->price}} MAD
                                @if ($item->Old_price>0)
                                <strike>
                                    <span class="text-danger">{{$item->Old_price}} MAD</span>
                               </strike>
                               @endif

                            </span>
                            <h3 class="info-title mt-3" >PRODUCT INFO</h3>
                            <hr class="prd_info_hr">
                            <h5 class="product-desc">{{$item->description}}  </h5>
                            <h6 class="product-mad">Mad In {{$item->Country_Mad}} </h6>


                            <div class="add-to-card">
                                <form action="{{route("add.cart",$item->slug)}}" method="POST">
                                   @csrf
                                   <div class="form-group">
                                      <label for="add-to-card" class="qte-label">Qantity :</label>
                                        <input type="number" class="form-control"
                                        placeholder="Enter the desired quantity"
                                        id="add-to-card"
                                        name="qte"
                                        @if ($item->Qte>0 && $item->in_Stock==1)
                                        value="1"
                                        @else
                                        value="0"
                                        readOnly
                                        @endif
                                        min="1"
                                        max="{{$item->Qte}}"
                                        >
                                   </div>
                                   <div class="form-group">

                                       <button type="submit"
                                                @if ($item->Qte<=0 || $item->in_Stock===0)
                                                onclick="event.preventDefault();"
                                                @else
                                                onclick=""
                                                @endif
                                           class="btn btn-block bg-dark text-white">
                                           <i class="fas fa fa-credit-card text-white"></i> Add to Cart
                                       </button>
                                   </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </section>


            <section class="comment">

                    <div class="add-comment">
                        <form action="{{route('Comment.store')}}" method="POST" class="form">
                            @csrf
                            <input type="hidden" name="item_id" value="{{$item->id}}">
                           <textarea name="comment" id="comment"
                            rows="1"
                            placeholder="Entre Your Comment about this product"></textarea>
                            <input type="submit" value="Add Your Comment">
                        </form>
                    </div>

                    <div class="comment-box mt-4">
                        <div class="coment-box-heading">
                            <span>Comments</span>
                            <h1>Clients Says</h1>
                        </div>

                        <div class="comment-box-container">
                         @foreach ($comments as $comment)
                         @if ($comment->status ===1)
                            <div class="comment-info">
                                <!--Box Top-->

                                <div class="box-top">
                                    <div class="profile">
                                           <div class='profil-img'>
                                            @if (!empty($comment->user->image))
                                               <img src="{{asset("images/users/".$comment->user->image)}}" alt="{{$comment->user->name}}">
                                            @else
                                               <img src="{{asset("images/users/DefaultUserImg.png")}}" alt="Profil_Image">
                                            @endif
                                            </div>
                                           <div class="name-user">
                                               <strong>{{$comment->user->name}}</strong>
                                               @if (!empty($comment->user->FullName))
                                               <strong>@ {{$comment->user->FullName}}</strong>
                                               @else
                                               <strong>@ {{$comment->user->name}}</strong>
                                               @endif
                                           </div>
                                    </div>
                                    <div class="date">
                                        {{$comment->created_at}}
                                    </div>
                                </div>

                                <!--Box Bottom-->
                                <div class="client-comment">
                                   <p>{{$comment->comment}}.</p>
                               </div>

                            </div>
                         @endif
                         @endforeach
                        </div>



                          {{-- Comment Pagination --}}

                      <div class="justify-content-center d-flex my-pagination">
                        {{$comments->links("pagination::bootstrap-4")}}
                      </div>

                    </div>


            </section>





@endsection
@section('javascript')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script>
        window.onload=function(){
            window.location=window.location.href+"#Show-product";
        }
        /* Initialize Swiper*/
        /*swiper script*/
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>
@endsection
