@extends('layouts.app')
@section('content')
<div class="body-content outer-top-ts" >
  <div class='container'>
  
    @livewire('store.all-product')
    </div>
</div>
@include('layouts.footer')
@endsection