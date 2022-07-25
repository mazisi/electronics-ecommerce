<div class='row'>
    <!-- ============================================== SIDEBAR ============================================== -->
<div class="col-md-3 sidebar"> 
<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu side-menu-inner animate-dropdown outer-bottom-xs">
  <div class="head">Categories 
    <span wire:loading wire:target='setFilterByCategoryValue' class="text-center"> <i class="fa fa-spinner fa-spin"></i></span>
  </div>
  <nav class="yamm megamenu-horizontal" style="padding-left: 20px;">
    <ul class="nav">

    @foreach ($categories as $category)
    <li class="dropdown menu-item" > 
      <a wire:click="setFilterByCategoryValue('{{ $category->id }}')" href="#" class="dropdown-toggle" 
        data-toggle="dropdown">{{ $category->name }} </a>
    </li>
    @endforeach
      <!-- /.menu-item -->
      
      
      
    </ul>
    <!-- /.nav --> 
  </nav>
  <!-- /.megamenu-horizontal --> 
</div>

</div>
<!-- /.sidemenu-holder --> 
<!-- ============================================== SIDEBAR : END ============================================== --> 

<div class="col-md-9 rht-col"> 

<!-- ========================================== SECTION – HERO ========================================= -->


<div class="clearfix filters-container m-t-10">
  <div class="row">
    <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-6">
      <div class="filter-tabs">
        <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
          <li class="active"> <a data-toggle="tab" href="#grid-container">
            <i class="icon fa fa-th-large"></i>All Products</a> </li>
          
        </ul>
      </div>
      <!-- /.filter-tabs --> 
    </div>
    <!-- /.col -->
    <div class="col col-sm-12 col-md-5 col-lg-5 hidden-sm">
      <div class="col col-sm-6 col-md-12 col-lg-7 no-padding">
        <div class="lbl-cnt"> <span class="lbl">Sort by</span>
          <div class="fld inline">
            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
              <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> All <span class="caret"></span> </button>
              <ul role="menu" class="dropdown-menu">
                <li wire:click="setSortBy('Lowest-Price')" role="presentation"><a href="#!">Price:Lowest first</a></li>
                <li wire:click="setSortBy('Highest-Price')" role="presentation"><a href="#!">Price:Highest first</a></li>
                <li wire:click="setSortBy('A-Z')" role="presentation"><a href="#!">Product Name:A to Z</a></li>
              </ul>
            </div>
          </div>
          <!-- /.fld --> 
        </div>
        <!-- /.lbl-cnt --> 
      </div>
      <!-- /.col -->
      <div class="col col-sm-6 col-md-5 col-lg-5 no-padding hidden-sm hidden-md">
        <div class="lbl-cnt"> <span class="lbl">Show</span>
          <div class="fld inline">
            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
              <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> -- <span class="caret"></span> </button>
              <ul role="menu" class="dropdown-menu">
                <li wire:click="setShowLimitFilter('10')" role="presentation"><a href="#!">10</a></li>
                <li wire:click="setShowLimitFilter('20')" role="presentation"><a href="#!">20</a></li>
                <li wire:click="setShowLimitFilter('30')"  role="presentation"><a href="#!">30</a></li>
                <li wire:click="setShowLimitFilter('40')"  role="presentation"><a href="#!">40</a></li>
                <li wire:click="setShowLimitFilter('50')"  role="presentation"><a href="#!">50</a></li>
                <li wire:click="setShowLimitFilter('60')"  role="presentation"><a href="#!">60</a></li>
                <li wire:click="setShowLimitFilter('70')"  role="presentation"><a href="#!">70</a></li>
                <li wire:click="setShowLimitFilter('80')"  role="presentation"><a href="#!">80</a></li>
                <li wire:click="setShowLimitFilter('90')"  role="presentation"><a href="#!">90</a></li>
                
              </ul>
            </div>
          </div>
          <!-- /.fld --> 
        </div>
        <!-- /.lbl-cnt --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.col -->
    <div class="col col-sm-6 col-md-4 col-xs-6 col-lg-4 text-right">
    
      <div class="pagination-container">
        <ul class="list-inline list-unstyled">
          <span wire:loading wire:target='setSortBy' class="text-center"> <i class="fa fa-spinner fa-spin"></i></span>
          <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
          <li><a href="#">1</a></li>
          <li class="active"><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
        <!-- /.list-inline --> 
      </div>
       </div>
    <!-- /.col --> 
  </div>
  <!-- /.row --> 
</div>
<div class="search-result-container ">
  <div id="myTabContent" class="tab-content category-list">
    <div class="tab-pane active " id="grid-container">
      <div class="category-product">
        <div class="row">
          @forelse ($allProducts as $product)
          <div class="col-sm-6 col-md-4 col-lg-4 wow fadeInUp">
            <div class="item">
             <div class="products">
               <div class="product">
                 <div class="product-image">
                   <div class="image"> 
                   <a href="/store/product-detail?product={{ $product->id }}">
                      <img src="assets/images/products/p2.jpg" alt=""> 
                   </a> 
                </div>
                   <!-- /.image -->
                   
                   {{-- <div class="tag sale"><span>hot</span></div> --}}
                 </div>
                 <!-- /.product-image -->
                 
                 <div class="product-info text-left">
                 <div class="store"><a href="#">Altima</a></div>
                   <h3 class="name"><a href="/store/product-detail?product={{ $product->id }}">{{ $product->name }}</a></h3>
                   
                   <div class="description"></div>
                   <div class="product-price"> 
                    @if (is_null($product->discount_price))
                    <span class="price"> R{{ $product->price }} </span> 
                    @else
                    <span class="price">R {{ $product->discount_price }} </span> <span class="price-before-discount">R {{ $product->price }}</span>
                    @endif
                     </div>
                   <!-- /.product-price --> 
                   
                 </div>
                 <!-- /.product-info -->
                 <div class="cart clearfix animate-effect">
                   <div class="action">
                     <ul class="list-unstyled">
                       <li class="add-cart-button btn-group">
                         <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                         <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                       </li>
                       <li class="lnk wishlist"> <a class="add-to-cart" href="/store/product-detail?product={{ $product->id }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                       <li class="lnk"> <a class="add-to-cart" href="/store/product-detail?product={{ $product->id }}" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                     </ul>
                   </div>
                   <!-- /.action --> 
                 </div>
                 <!-- /.cart --> 
               </div>
               <!-- /.product --> 
               
             </div>
             <!-- /.products --> 
             </div>
           </div>
          @empty

          <div class="col-sm-6 col-md-4 col-lg-4"></div>
          <div class="col-sm-6 col-md-4 col-lg-4">No products found.</div>
          <div class="col-sm-6 col-md-4 col-lg-4"></div>
              
          @endforelse          
         
          
          
          
        </div>
        <!-- /.row --> 
      </div>
      <!-- /.category-product --> 
      
    </div>
    <!-- /.tab-pane -->

  </div>
  <!-- /.tab-content -->
  <div class="clearfix filters-container bottom-row">
    <div class="text-center">
      <div class="pagination-container" wire:loading.remove wire:target='loadMore'>
        <ul class="list-inline list-unstyled">
          @if ($hasMorePages)
              <button wire:click='loadMore' class="btn btn-primary">Load More</button>
          @endif
      </div>

      <div class="pagination-container" wire:loading wire:target='loadMore'>
        <ul class="list-inline list-unstyled">
        <button wire:click='loadMore' class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i></button>
      </div>

      </div>
    <!-- /.text-right --> 
    
  </div>
  <!-- /.filters-container --> 
  
</div>
<!-- /.search-result-container --> 


</div>
<!-- /.col --> 
</div>