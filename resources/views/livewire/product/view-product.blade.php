<div>
    <form wire:submit.prevent='update'>
<div class="row g-3 mb-3">
    <div class="col-xl-4 col-lg-4">
        <div class="sticky-lg-top">
            <div class="card mb-3">
                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                    <h6 class="m-0 fw-bold">Pricing Info</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-12">
                            <label  class="form-label">Product Price</label>
                            <input type="text" class="form-control" wire:model.defer="getProduct.price">
                        </div>
                        <div class="col-md-12">
                            <label  class="form-label">Discount Price</label>
                            <input type="text" class="form-control" wire:model.defer="getProduct.discount_price">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" value="1" name="visibilty" data-parsley-errors-container="#error-radio" 
                                    data-parsley-multiple="gender"
                                    @if($getProduct->visibility == 1) checked @endif>
                                    <span class="text-primary"><i></i>In Stock</span>
                                </label>
                                <label class="fancy-radio"  style="margin-left: 2rem;">
                                    <input type="radio" value="0" name="visibilty"  wire:model.defer="getProduct.visibility"
                                     data-parsley-multiple="gender" @if($getProduct->visibility == 0) checked @endif>
                                    <span class="text-danger"><i></i>Out Of Stock</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header py-1 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                    <h6 class="m-0 fw-bold">Product Image</h6>
                </div>
                <div class="card-body">
                    <div class="profile-block ">
                        @if(!is_null($getProduct->image))
                        <a href="{{ asset('storage/'.$getProduct->image) }}" data-lightbox="{{ $getProduct->name }}" data-title="{{ $getProduct->name }}">
                            <img src="{{ asset('storage/'.$getProduct->image) }}" alt="" class="avatar xl rounded img-thumbnail shadow-sm">
                        </a>
                        @else
                            <p class="text-center">Empty.</p>
                        @endforelse
                        
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <div class="col-xl-8 col-lg-8">
        <div class="card mb-3">
            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                <h6 class="mb-0 fw-bold ">Basic information</h6>
            </div>
            <div class="card-body">
                
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control"  wire:model.defer="getProduct.name">
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Pack Size</label>
                            <input type="text" class="form-control" wire:model.defer="getProduct.packsize">
                        </div>
                        <div class="col-md-12">
                            <label for="addnote" class="form-label">Description</label>
                            <textarea class="form-control" id="addnote" rows="5" wire:model.defer="getProduct.description"></textarea> 
                        </div>

                    <div class="col-md-12"
                    wire:ignore
                    x-data
                    x-init="
                    FilePond.setOptions({
                    allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
                    server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('image',file, load, error, progress)
                    },
                    revert: (filename, load) =>{
                    @this.removeUpload('image', filename, load)
                    },
                    },
                    });
                    FilePond.create($refs.input);">
                            <label for="addnote" class="form-label">Upload Product Image</label>
                            <input type="file" x-ref="input" wire:model.defer="image" class="form-control"> 
                        </div>
                  <button wire:loading.remove wire:target="update" type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                  <button wire:loading wire:target="update" disabled type="button" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Loading</button>

                    </div>
                
            </div>
        </div>
    </div>

</div>
</form>
</div