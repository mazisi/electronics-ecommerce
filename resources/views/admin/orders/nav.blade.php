<div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
  <h3 class="fw-bold mb-0">
    @if (Route::currentRouteName() == 'orders')
    New
    @elseif (Route::currentRouteName() == 'pending_orders')
      Pending
      @elseif (Route::currentRouteName() == 'paid_orders')
      Paid
      @elseif (Route::currentRouteName() == 'declined_orders')
      Declined

    @endif
     Orders</h3>

     
  <div class="btn-group group-link btn-set-task w-sm-100">
      <a href="/orders" class="btn @if (Route::currentRouteName() == 'orders')
      active
      @endif
       d-inline-flex align-items-center" aria-current="page"><i class="icofont-wall px-2 fs-5"></i>New</a>
      <a href="/pending-orders" class="btn 
      @if (Route::currentRouteName() == 'pending_orders')
      active
      @endif
      d-inline-flex align-items-center"><i class="icofont-hour-glass px-2 fs-5"></i> Pending</a>
      <a href="/paid-orders" class="btn  @if (Route::currentRouteName() == 'paid_orders')
      active
      @endif
      d-inline-flex align-items-center"><i class="icofont-check-circled px-2 fs-5"></i> Paid</a>
      <a href="/declined-orders" class="btn @if (Route::currentRouteName() == 'declined_orders')
      active
      @endif d-inline-flex align-items-center"><i class="icofont-close-circled px-2 fs-5"></i> Declined</a>
  </div>
</div>