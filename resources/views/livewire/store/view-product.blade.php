<div class="quantity-container info-container">
    <div class="row">
        
        <div class="qty">
            <span class="label">Qty :</span>
        </div>
        
        <div class="qty-count">
            <div class="cart-quantity">
                <div class="quant-input">
                    <div class="arrows">
                      <div wire:click='increamentQuantity' class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                      <div wire:click='decrementQuantity' class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                    </div>
                    <input type="text" value="1" wire:model='quantity'>
              </div>
            </div>
        </div>

        <div class="add-btn" wire:loading.remove wire:target='addToCart'>
            <a  wire:click='addToCart' href="#!" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Add To Cart</a>
        </div>

        <div class="add-btn" wire:loading wire:target='addToCart'>
            <a  href="#!" class="btn btn-primary"><i class="fa fa-spinner fa-spin "></i></a>
        </div>

        
    </div>
</div>