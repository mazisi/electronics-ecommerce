@extends('admin.layouts.app')
@section('content')
  
<div class="body d-flex py-3">
  <div class="container-xxl">
      <div class="row align-items-center">
          <div class="border-0 mb-4">
              <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                  <h3 class="fw-bold mb-0">Customer Order</h3>
              </div>
          </div>
      </div> <!-- Row end  -->
      @livewire('admin.view-order')
  </div>
</div>


@endsection