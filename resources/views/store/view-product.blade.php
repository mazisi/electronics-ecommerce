@extends('layouts.app')
@section('content')
<div class="body-content outer-top-ts">
	<div class='container'>
		<div class='row single-product'>
			<!-- /.sidebar -->
			<div class='col-md-12'>

            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-5 col-md-4 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
            <div class="single-product-gallery-item" id="slide1">
              @if (is_null($viewProduct->image))
              <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('assets/images/products/p2.jpg') }}">
                <img class="img-responsive" alt="" src="{{ asset('assets/images/products/p2.jpg') }}" 
                data-echo="{{ asset('assets/images/products/p2.jpg') }}" />
            </a>
              @else
              <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('storage/'.$viewProduct->image) }}">
                <img class="img-responsive" alt="" src="{{ asset('storage/'.$viewProduct->image) }}" 
                data-echo="{{ asset('storage/'.$viewProduct->image) }}" />
            </a>
              @endif
                
            </div>
        </div>

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-7 col-md-5 product-info-block'>
						<div class="product-info">
							<h1 class="name">{{ $viewProduct->name }}</h1>

							<div class="stock-container info-container m-t-10">
								<div class="row">
                   <div class="col-lg-12">
									<div class="pull-left">
										<div class="stock-box">
											<span class="label">Availability : </span>
										</div>	
									</div>
									<div class="pull-left">
										<div class="stock-box">
											
                        @if ($viewProduct->visibility == '1')
                         <span class="value" style="color: #000"> In Stock</span>
                        @else
                        <span class="value"> Out Of Stock</span>
                        @endif
                      </span>
										</div>	
									</div>
                  </div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

		

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
										<div class="price-box">
                      @if (is_null($viewProduct->discount_price))
                      <span class="price">R{{ $viewProduct->price }}</span>
                      @else
                        <span class="price">R{{ $viewProduct->discount_price }}</span>
                        <span class="price-strike">R{{ $viewProduct->price }}</span>
                      @endif
											
										</div>
									</div>

									{{-- <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
										<div class="favorite-button">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div> --}}

								</div><!-- /.row -->
							</div><!-- /.price-container -->

              @livewire('store.view-product')

							

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
                    <div class="col-lg-3 col-sm-12 col-md-3">
                    <div class="store-details">
                    <p>{{ $viewProduct->description }}</p>
                    </div>
                    </div>
				</div><!-- /.row -->
                </div>
		

			 <!-- ============================================== RELATED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp">
          <h3 class="section-title">Related Products</h3>
          
          <div class="new-arriavls">
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            @forelse ($relatedProducts as $relatedProduct)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    @if(is_null($relatedProduct->image))
                    <div class="image"> 
                      <a href="/store/product-detail?product={{ $relatedProduct->id }}">
                         <img src="{{ asset('assets/images/products/p10.jpg') }}" alt=""> 
                       </a>
                      
                 </div>
                 @else
                 <div class="image"> 
                  <a href="/store/product-detail?product={{ $relatedProduct->id }}">
                     <img src="{{ asset('storage/'.$relatedProduct->image) }}" alt=""> 
                   </a>
                  
             </div>
                    @endif
                    
                    <!-- /.image -->
                    
                 
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                   {{-- <div class="brand">Flipmart</div> --}}
                    <h3 class="name"><a href="/store/product-detail?product={{ $relatedProduct->id }}">{{ $relatedProduct->name }}</a></h3>
                   
                    <div class="description"></div>
                    <div class="product-price"> 
                      @if (is_null($relatedProduct->discount_price))
                      <span class="price"> R{{ $relatedProduct->price }} </span> 
                      @else
                      <span class="price"> R{{ $relatedProduct->discount_price }} </span> 
                      <span class="price-before-discount">R {{ $relatedProduct->price }}</span>
                      @endif
                      
                     </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            @empty
            <div class="text-center">No related products found.</div>              
            @endforelse
            
            <!-- /.item -->
             
          </div>
          <!-- /.home-owl-carousel --> 
          </div>
        </section>
        <!-- /.section --> 
        <!-- ============================================== RELATED PRODUCTS : END ============================================== --> 
</div>
</div>
</div>
@include('layouts.footer')
@endsection