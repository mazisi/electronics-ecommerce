@extends('admin.layouts.app')
@section('content')
  
<div class="body d-flex">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                @include('admin.orders.nav')
            </div>
        </div> <!-- Row end  -->
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    @livewire('admin.orders')
                </div>
            </div>
        </div><!-- Row End -->
    </div>
</div>


@endsection