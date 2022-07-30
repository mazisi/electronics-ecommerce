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
    @if(session()->has('error'))
    <script>
        function notify(message, type){
            $.growl({
                message: message
            },{
                type: type,
                allow_dismiss: false,
                label: 'Cancel',
                className: 'btn-xs btn-inverse',
                placement: {
                    from: 'bottom',
                    align: 'right'
                },
                delay: 3000,
                animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };

      notify('{{ session('error') }}', 'inverse');   
    </script>

    @elseif (session('success'))

    <script>
        function notify(message, type){
            $.growl({
                message: message
            },{
                type: type,
                allow_dismiss: false,
                label: 'Cancel',
                className: 'btn-xs btn-inverse',
                placement: {
                    from: 'bottom',
                    align: 'right'
                },
                delay: 3000,
                animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };

      notify('{{ session('success') }}', 'inverse');   
    </script>
    @endif
</div>