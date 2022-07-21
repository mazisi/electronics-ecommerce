@extends('admin.layouts.app')
@section('content')
  
<div class="body d-flex py-lg-3 py-md-2">
  <div class="container-xxl">
      <div class="col-12">
          <div class="card mb-3">
              <div class="card-body text-center p-5">
                  <img src="{{ asset('dashboard/assets/images/no-data.svg') }}" class="img-fluid mx-size" alt="No Data">
                  <div class="mt-4 mb-2">
                      <h5 class="text-muted">Ooops!! An unknown error occured..</h5>
                  </div>
                  <a href="{{ route('dashboard') }}" type="button" class="btn btn-primary border lift mt-1">Back to Home</a>
              </div>
          </div>
      </div>
  </div>

</div>



@endsection