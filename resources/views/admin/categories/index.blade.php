@extends('admin.layouts.app')
@section('content')
  
<div class="body d-flex py-3">
  <div class="container-xxl">
      <div class="row align-items-center">
          <div class="border-0 mb-4">
              <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                  <h3 class="fw-bold mb-0">Categories</h3>
                  <a data-bs-toggle="modal" data-bs-target="#add-category"
                   href="#!" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100">
                    <i class="icofont-plus-circle me-2 fs-6"></i> Add Category</a>
              </div>
          </div>
      </div> <!-- Row end  -->
      @livewire('category.categories')
  </div>
</div>



@endsection