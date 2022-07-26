@extends('layouts.app')
@section('content')
<div class="body-content outer-top-ts" >
  <div class='container'>
    <style>

      
element.style {
    width: 18rem;
}
.bd-example>:last-child {
    margin-bottom: 0;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
}
    </style>
  
    <div class='row'>
      <div class="col-md-12 rht-col"> 
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">

                  @forelse ($brands as $brand)
                  <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp ">
                  <div class="item card">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> 
                          <a href="{{ $brand->url }}" target="_blank">
                             <img src="{{ asset('storage/'.$brand->logo) }}" alt=""> 
                           </a> 
                       </div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left" style="padding-left: 1rem;">
                          <h3 class="name"><a href="{{ $brand->url }}" target="_blank">{{ $brand->name }}</a></h3>
                         
                          
                        </div>
                      </div>
                    </div>
                    <!-- /.products --> 
                    </div>
                  </div>
                  @empty
                  <p class="text-center">Empty.</p>
                    
                  @endforelse
                </div> 
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.search-result-container --> 

   
      </div>
      <!-- /.col --> 
    </div>
    </div>
</div>
@include('layouts.footer')
@endsection