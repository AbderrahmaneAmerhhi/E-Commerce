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
                                <P><span style="color:#3b3b3b77">Special offers </span> for you woman</P>
                                <a href="/#products" class="btn btn-danger text-uppercase mt-4">Our Products</a>
                            </div>
                         </div>                      </div>
                      <div class="carousel-item">
                          <div class="home-banner home-banner-2">
                             <div class="home-banner-text">
                                 <h2>E-SHOP</h2>
                                 <P><span style="color:#3b3b3b77">You can pay by card</span> or using Paypal</P>
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


            <section id="Card" class="card mt-3">
                <div class="container">
                    <div class="row justify-content-cente ">
                       <div class="col-md-12 p-3 card">
                        <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                  <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                  </tr>

                              </thead>
                              <tbody>
                              @foreach ($items as $item)

                                  <tr>
                                    <td>
                                        <img src="{{asset("images/items/".$item->associatedModel->image)}}"
                                          alt="{{$item->name}}"
                                          class="img-fluid rounded-circle"
                                          width="60"
                                          height="60"
                                        >

                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}} MAD</td>
                                    <td >
                                        <form action="{{route("update.cart",$item->associatedModel->slug)}}"
                                              method="POST"
                                        class="d-flex flex-row  justify-content-center align-items-center ">
                                            @csrf
                                            @method("PUT")
                                            <div class="form-group">
                                                <input type="number"
                                                       name="quantity"
                                                        id="quantity"
                                                        value="{{$item->quantity}}"
                                                        min="1"
                                                        max="{{$item->associatedModel->quantity}}"
                                                >
                                            </div>
                                            <div class="form-group ml-1">
                                               <button type="submit" class="btn btn-sm btn-warning">
                                                    <i class="fas fa fa-edit"></i>
                                               </button>
                                            </div>
                                        </form>

                                    </td>
                                    <td>{{$item->quantity * $item->price }} MAD</td>
                                    <td>
                                        <form action="{{route('remove.cart',$item->associatedModel->slug) }}"
                                             method="POST"
                                              class="d-flex flex-row justify-content-center align-items-center">
                                            @csrf
                                            @method("DELETE")
                                             <div class="form-group">
                                                 <button type="submit" class="btn btn-sm btn-danger">
                                                     <i class="fa fa-trash"></i>
                                                 </button>
                                             </div>
                                        </form>

                                    </td>

                                  </tr>


                              @endforeach
                               <tr class="text-dark font-weight-bold">
                                   <td colspan="3" class="border border-success">
                                     Total
                                   </td>
                                   <td colspan="3" class="border border-success">
                                    {{Cart::getSubTotal() }} MAD
                                  </td>
                               </tr>
                            </tbody>
                            </table>
                             {{-- payment --}}
                             @if (Cart::getSubTotal()>0)
                                <div class="row">
                                    <div class="form-group">
                                        <a href="{{route('make.payment')}}" class="btn btn-secondary mt-3 ml-2 d-flex align-items-center "  >
                                            <i class="fab fa-cc-paypal mr-1" style="font-size: 1.7rem"></i>   PAY  {{Cart::getSubTotal() }} MAD WITH PAYPAL
                                        </a>
                                    </div>
             =
                                    <div class="form-group">
                                        <a type="button" href="{{route("cart.checkout",Cart::getSubTotal())}}" class="btn btn-secondary mt-3 ml-2  d-flex align-items-center">
                                          <i class="fa fa-credit-card mr-1" style="font-size: 1.7rem"></i>  PAY  {{Cart::getSubTotal() }} MAD WITH CART
                                        </a>

                                    </div>
                                </div>


                             @endif





                       </div>
                    </div>
                </div>
            </section>




@endsection
@section('javascript')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script>
        window.onload=function(){
                window.location=window.location.href+"#Card";
            }
    </script>
@endsection
