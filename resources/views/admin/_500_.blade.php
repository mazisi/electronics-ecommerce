@extends('admin.layouts.app')
@section('content')
  
<div class="body d-flex py-lg-3 py-md-2">
  <div class="container-xxl">
      <div class="col-12">
          <div class="card mb-3">
              <div class="card-body text-center p-5">
                <div class="col-12 text-center mb-4">
                  <img src="{{ asset('dashboard/assets/images/server_error.PNG') }}" class="w240 mb-4" alt="" />
                  <h5>Ooops! An Unknown Error Occurred.Please try again</h5>
                  <span class="">Sorry, the action you're trying to perfom has returned with an unknown error. if you think something is broken, report a problem.</span>
              </div>
                  <a href="{{ route('dashboard') }}" type="button" class="btn btn-primary border lift mt-1">Back to Home</a>
              </div>
          </div>
      </div>
  </div>

</div>



@endsection