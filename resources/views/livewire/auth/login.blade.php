<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Login</h4>
	<form wire:submit.prevent='authenticate' class="register-form outer-top-xs" role="form">
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input wire:model.defer='email' type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input wire:model.defer='password' type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		@error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Remember Me</label>
		    <input wire:model.defer='remember' type="checkbox" >
		</div>
<div>
    @if (session()->has('message'))
    <div class="text-danger">
        {{ session('message') }}
    </div>
    @endif
</div>
        
        <div  wire:loading.remove wire:target="authenticate">
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign In</button>
        </div>
        <div wire:loading wire:target="authenticate">
          <button  type="button" class="btn-upper btn btn-primary checkout-page-button"><i class="fa fa-spinner fa-spin "></i></button>
        </div>
	</form>
	
</div>	
