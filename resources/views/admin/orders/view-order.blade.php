@extends('admin.layouts.app')
@section('content')
  
<div class="body d-flex" >
  <div class="container-xxl">
      <div class="row align-items-center">
          <div class="border-0 mb-4">
          </div>
      </div> <!-- Row end  -->
      @livewire('admin.view-order')
  </div>
</div>


@endsection