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


            <section id="orders" class="orders mt-3 mb-5">
                <div class="container">
                    <div class="order-box-heading">
                        <span>Orders</span>
                        <h1>{{$user->name}} Orders</h1>
                    </div>

                    <div class="row justify-content-cente ">
                       <div class="col-md-12 p-3 card">
                        <div class="table-responsive">
                            <table class="table table-hover mb-5">
                              <thead>
                                  <tr>
                                    <th>#Id</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Delivered</th>

                                  </tr>

                              </thead>
                              @foreach ($orders as $order)

                              <tbody>
                                  <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->product_name}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->qte}}</td>
                                    <td>{{$order->total}} MAD</td>

                                    <td>
                                        @if ($order->paid)
                                          <i class="fas fa-check text-success"></i>
                                          @else
                                          <i class="fas fa-exclamation-circle text-danger"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->delivered)
                                          <i class="fas fa-check text-success"></i>
                                        @else
                                         <i class="fas fa-exclamation-circle text-danger"></i>
                                        @endif
                                    </td>
                                  </tr>


                            </tbody>
                            @endforeach

                            </table>


                        </div>
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
                window.location=window.location.href+"#orders";
            }
    </script>
@endsection
