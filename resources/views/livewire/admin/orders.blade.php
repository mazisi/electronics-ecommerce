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
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <a href="/view-order?user={{ $order->cookie }}" class="btn btn-outline-secondary"><i class="icofont-eye-alt"></i></a>
                            <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                        </div>
                    </td>
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
    <div class="float-end mt-2">
        {{ $orders->links() }}
    </div>
</div>