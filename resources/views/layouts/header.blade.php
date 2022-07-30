<header class="header-style-1"> 
  
        <div class="clearfix"></div>
      </div>
    </div>
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-lg-2 col-sm-12 col-md-3 logo-holder"> 
          <div class="logo"> <a href="/"> <img src="{{ asset('assets/images/logo.png') }}" alt="logo" style="height: 6rem"> </a> </div>
          </div>
        
        <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 top-search-holder"> </div>
      
        
         <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 navmenu"> 
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="dropdown "> <a href="/frontend-brands">Brands</a> 
                </li>
                <li class="dropdown"> <a href="/electronics">Electronics</a> 
                 </li>
                <li class="dropdown"> <a href="/all-products">Store</a> 
                </li>
                <li class="dropdown"> <a href="/strategy-&-coaching">Strategy & Coaching</a>
                </li>
                @auth
                <li class="dropdown"> <a href="{{ route('dashboard') }}">Dashboard</a> 
                </li>
                @endauth
                
                
            
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
      <div class="top-cart-row">
          
         @livewire('cart-counter') 
      </div>
    </div>
    <!-- /.container-class --> 
    
<style>
  .active{
    background-color: #fff;
    border-radius: 5%;
  }
</style>
        
        </div>
    
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
 
  
</header> 