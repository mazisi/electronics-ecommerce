<div class="row g-3 mb-xl-3">
    <div class="col-xxl-8 col-xl-12 col-lg-12 col-md-12">
        <div class="row g-3 mb-3 row-cols-1 row-cols-md-1 row-cols-lg-2 row-deck"> 
            <div class="col-md-4 col-sm-4">
                <div class="card auth-detailblock">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Person Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Full Name:</label>
                                <span><strong> {{ $userData->full_name }}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Email:</label>
                                <span><strong>{{ $userData->email }}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Mobile:</label>
                                <span><strong>{{ $userData->mobile }}</strong></span>
                            </div>

                            <div class="col-12">
                                <h6 class="mb-0 fw-bold ">Delivery Address</h6>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Address:</label>
                                <span><strong> {{ $userData->address }}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">City:</label>
                                <span><strong>{{ $userData->city }}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Zipcode:</label>
                                <span><strong>{{ $userData->postal_code }}</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="card"> 
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Customer Order</h6>
                    </div>
                    <div class="card-body"> 
                        <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                <tr>
                                    <td>
                                        <a href="order-details.html">
                                            @if (is_null($order->product->image))
                                             <img src="{{ asset('assets/images/no-image.jpg') }}" class="avatar lg rounded me-2">
                                            @else
                                             <img src="{{ asset('storage/'.$order->product->image) }}" class="avatar lg rounded me-2">
                                            @endif
                                            <span> {{ $order->product->name }}</span>
                                        </a>   
                                            
                                            
                                    </td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>
                                        @php
                                        if (is_null($order->product->discount_price)){
                                            $price = $order->product->price;
                                        } else {
                                            $price = $order->product->discount_price;
                                        }
                                        @endphp
                                        
                                        R{{ $price }}
                                        
                                    </td>
                                    <td>R{{ $order->quantity * $price }}</td>
                                </tr>
                                @empty
        
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Empty.</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                    
                                @endforelse
                                
                              
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>