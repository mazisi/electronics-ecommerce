<div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
    <div class="items-cart-inner">
      <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
      <div class="basket-item-count"><span class="count">{{ $cartItems->count() }}</span></div>
      <div class="total-price-basket"> <span class="lbl">My Cart</span>  </div>
    </div>
    </a>
    <ul class="dropdown-menu">
      <li>
        @php
            $cart_total = 0;
        @endphp
        @forelse ($cartItems as $cartItem)

        @if (is_null($cartItem->product->discount_price))
        @php
            $cart_total += $cartItem->product->price * $cartItem->quantity;
        @endphp
        @else
            @php
            $cart_total += $cartItem->product->discount_price * $cartItem->quantity;
            @endphp
        @endif
        
        <div class="cart-item product-summary">
            <div class="row">
              <div class="col-xs-4">
                @if (is_null($cartItem->image))
                        <div class="image">
                            <a href="/store/product-detail?product={{ $cartItem->product->id }}">
                            <img src="{{ asset('assets/images/no-image.jpg') }}" alt="">
                        </a> 
                    </div>
                @else
                    <div class="image">
                        <a href="/store/product-detail?product={{ $cartItem->product->id }}">
                        <img src="{{ asset('storage/'.$cartIten->image) }}" alt="">
                    </a> 
                </div>
                @endif
                
              </div>
              <div class="col-xs-7">
                <h3 class="name"><a href="#">{{ $cartItem->product->name }}</a></h3>
                <div class="price">
                    @if (is_null($cartItem->product->discount_price))
                      R{{ $cartItem->product->price }}
                    @else
                      R{{ $cartItem->product->discount_price }}
                    @endif
                </div>
                
              </div>
              <div class="col-xs-1 action"> <a wire:click="removeFromCart('{{ $cartItem->id }}')" href="#!"><i class="fa fa-trash text-danger"></i></a> </div>
            </div>
          </div>
        @empty
        <div class="cart-item product-summary">
            <div class="row">
              <div class="col-xs-4"></div>
              <div class="col-xs-7">
                <div class="price">Empty.</div>
              </div>
            </div>
          </div>
            
        @endforelse
       
        <!-- /.cart-item -->
        <div class="clearfix"></div>
        <hr>
        <div class="clearfix cart-total">
          <div class="pull-right"> <span class="text">Total :</span><span class="price">R{{ $cart_total }}</span> </div>
          <div class="clearfix"></div>
           <a href="/cart" class="btn btn-upper btn-primary btn-block m-t-20">View Cart</a>
          <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20 btn-check">Checkout</a> </div>
        <!-- /.cart-total--> 
        
      </li>
    </ul>
    <!-- /.dropdown-menu--> 
  </div>