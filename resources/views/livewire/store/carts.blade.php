<div class="row ">
        
    <div class="col-md-12">
    <!-- /.breadcrumb --> 
          <div class="shopping-cart">
              <div class="shopping-cart-table ">
                <form class="col-md-8">
  <div class="table-responsive">
      <table class="table">
          <thead>
              <tr>
                  <th class="cart-romove item">Remove</th>
                  <th class="cart-description item">Image</th>
                  <th class="cart-product-name item">Product Name</th>
                  <th class="cart-qty item">Quantity</th>
                  <th class="cart-total last-item">Total</th>
              </tr>
          </thead><!-- /thead -->
          
          <tbody>
            @php $grandTotal = 0; @endphp
            @forelse ($cartProducts as $cartProduct)

            @php 
                if (is_null($cartProduct->product->discount_price)){
                            $price = $cartProduct->product->price;
                        } else {
                            $price = $cartProduct->product->discount_price;
                        }
                    $grandTotal += $price * $cartProduct->quantity;
            @endphp

            @php $grandTotal += $cartProduct->product->price * $cartProduct->quantity; @endphp
            <tr>
                <td class="romove-item d-flex"><a wire:click="removeFromCart('{{ $cartProduct->id }}')" href="#!" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a>
                  {{-- <a wire:click="updateCart('{{ $cartProduct->id }}')" href="#!"><i class="fa fa-check-circle text-success" aria-hidden="true">Update</i></a> --}}
                </td>
                <td class="cart-image">
                    <a class="entry-thumbnail" href="/store/product-detail?product={{ $cartProduct->product_id }}">
                        @if (is_null($cartProduct->product->image))
                        <img src="assets/images/products/p1.jpg" alt="">
                        @else
                        <img src="{{ asset('storage/'.$cartProduct->product->image) }}" alt="">
                        @endif
                        
                    </a>
                </td>
                <td class="cart-product-name-info">
                    <h4 class='cart-product-description'><a href="/store/product-detail?product={{ $cartProduct->product_id }}">{{ $cartProduct->product->name }}</a></h4>
                     <div class="cart-product-info">
                        <span class="product-color">Price:<span style="text-transform: none;">R{{ $cartProduct->product->price }}</span></span>
                    </div>
                </td>
                <td class="cart-product-quantity">
                    @php
                      App\Http\Livewire\Store\Carts::getQuantity($cartProduct->id);
                     @endphp
                    <div class="quant-input">
                       <input type="number" wire:model.defer='quantity'>
                      </div>
                    
                </td>
                <td class="cart-product-grand-total"><span class="cart-grand-total-price">R{{ $cartProduct->product->price }}</span></td>
            </tr>
            @empty
            <tr>
                <td class="romove-item"></td>
                <td class="cart-product-quantity"></td>
                <td class="cart-product-name-info"></td>
                <td class="cart-product-edit"><p>Your cart is empty.</p></td>
                <td class="cart-product-sub-total"></td>
                <td class="cart-product-grand-total"></td>
            </tr>
            @endforelse
           
          </tbody><!-- /tbody -->
     <tfoot>
        <tr>
            <td colspan="7">
                <div class="cart-grand-total pull-right" style="color: #84b943;font-size: 16px; font-weight: 600;">
                    Grand Total<span class="inner-left-md">R{{ $grandTotal }}</span>
                </div>
                    
            </td>
        </tr>
              <tr>
                  <td colspan="7">
                      <div class="shopping-cart-btn">
                          <span class="">
                              <a href="/all-products" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                              <button type="submit" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</button>
                          </span>
                      </div><!-- /.shopping-cart-btn -->
                  </td>
              </tr>
          </tfoot>
      </table><!-- /table -->
  </div>
</form >
</div>
<form wire:submit.prevent='placeOrder' class="col-md-4 col-sm-12 estimate-ship-tax" style="margin-top: -1.6rem;">
  <table class="table">
      <thead>
          <tr>
              <th>
                  <span class="estimate-title">Estimate shipping and tax</span>
                  <p>Enter your destination to get shipping and tax.</p>
              </th>
          </tr>
      </thead><!-- /thead -->
      <tbody class="@if ($errors->any()) animate__animated animate__shakeX @endif">
              <tr>
                  <td>
                      <div class="form-group">
                          <label class="info-title control-label">Your Full Name <span>*</span></label>
                          <input wire:model.defer='customer_name' type="text" class="form-control unicase-form-control text-input">
                          @error('customer_name')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      <div class="form-group">
                          <label class="info-title control-label">Phone Number <span>*</span></label>
                          <input wire:model.defer='customer_phone' type="text" class="form-control unicase-form-control text-input">
                          @error('customer_phone')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      <div class="form-group">
                        <label class="info-title control-label">Email <span>*</span></label>
                        <input wire:model.defer='customer_email' type="email" class="form-control unicase-form-control text-input">
                        @error('customer_email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title control-label">Shipping Address <span>*</span></label>
                        <textarea wire:model.defer='customer_address' class="form-control unicase-form-control text-input"></textarea>
                        @error('customer_address')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group col-lg-8">
                        <label class="info-title control-label">City/Town <span>*</span></label>
                        <input wire:model.defer='customer_city' type="text" class="form-control unicase-form-control text-input" placeholder="">
                        @error('customer_city')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                </div>
                      <div class="form-group col-lg-4">
                          <label class="info-title control-label">Zip Code <span>*</span></label>
                          <input wire:model.defer='postal_code' type="text" class="form-control unicase-form-control text-input" placeholder="">
                      @error('postal_code')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                        </div>
                      <div class="pull-right" wire:loading.remove wire:target='placeOrder'>
                          <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                      </div>
                      <div class="pull-right" wire:loading wire:target='placeOrder'>
                        <button type="button" class="btn-upper btn btn-primary"><i class="fa fa-spinner fa-spin "></i></button>
                    </div>
                  </td>
              </tr>
      </tbody>
  </table>
</form>
</div>
</div>
</div>