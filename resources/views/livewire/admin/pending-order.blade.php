<div class="card-body">
    <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
        <thead>
            <tr>
                <th>Customers</th> 
                <th>Email</th>
                <th>Phone</th> 
                <th>City</th> 
                <th>Date Order</th>
                <th>Actions</th>  
            </tr>
        </thead>
        <tbody>

            @forelse ($orders as $order)
                <tr>
                    <td>
                    <a href="/view-order?user={{ $order->cookie }}">
                        <img class="avatar rounded" src="https://eu.ui-avatars.com/api/?background=random&amp;name={{ Str::ucfirst($order->full_name) }}" alt="">
                        <span class="fw-bold ms-1">{{ Str::ucfirst($order->full_name) }}</span>
                    </a>
                    </td>
                    <td>{{ Str::lower($order->email) }}</td>
                    <td>{{ $order->mobile }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Mark As
                            </button>
                            <ul class="dropdown-menu">
                              <li><a wire:click="updateOrderStatus('Complete','{{ $order->id }}')" class="dropdown-item" href="#!">Complete <i class="icofont-tick-boxed"></i></a></li>
                              <li><a wire:click="updateOrderStatus('Declined','{{ $order->id }}')" class="dropdown-item text-danger" href="#!">Declined <i class="icofont-close-line-squared-alt"></i></a></li>
                            </ul>
                          </div>
                    </td>
                    <i class="fa fa-spinner fa-spin ">
                </tr>
            @empty
                <tr></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-danger">Empty.</td>
                    <td></td>
                    <td></td>
                </tr>                
            @endforelse
           
            
        </tbody>
    </table>
</div>