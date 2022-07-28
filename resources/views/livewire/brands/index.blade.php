<div class="row g-3 mb-3">
          
    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
        <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-3">
            @forelse ($brands as $brand)
                <div class="col">
                    <div class="card">
                            <div class="product">
                                <a href="{{ asset('storage/'.$brand->logo) }}" data-lightbox="{{ $brand->url }}" data-title="{{ $brand->url }}">
                                    <div class="product-image">
                                        <div class="product-item active">
                                            <img src="{{ asset('storage/'.$brand->logo) }}" alt="product" class="img-fluid w-100">
                                        </div>
                                        <a class="add-wishlist" href="#">
                                            <i class="bi bi-heart-fill text-danger"></i>
                                        </a>
                                    </div>
                                </a>
                                <div class="product-content p-3">
                                    <a href="{{ $brand->url }}" target="_blank" class="fw-bold">{{ $brand->name }} </a>
                                <a class="pull-right"
                                 x-data onclick="return confirm('Are you sure ??') ? @this.destroy('{{ $brand->id }}') : false" 
                                     href="#!" class=" mt-1"> <i class="icofont-ui-delete text-danger h4"></i></a>
    
                                </div>
                            </div>
                        </div>
                   </div>
            @empty
                <p class="text-center">No brands found.</p>
            @endforelse
            
        </div>
{{-- paginate --}}


        <div wire:ignore class="modal fade" id="create-brand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Create Brand</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">

                        <div class="col-md-12">
                            <label for="add-categ" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="add-categ" required wire:model.defer="brandName">
                            @error('brandName')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="add-categ" class="form-label">Brand Url</label>
                            <input type="url" class="form-control" id="add-categ" required wire:model.defer="brandUrl">
                            @error('brandUrl')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="col-md-12"
                    wire:ignore
                    x-data
                    x-init="
                    FilePond.setOptions({
                    allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
                    server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('brandLogo',file, load, error, progress)
                    },
                    revert: (filename, load) =>{
                    @this.removeUpload('brandLogo', filename, load)
                    },
                    },
                    });
                    FilePond.create($refs.input);">
                            <label for="addnote" class="form-label">Upload Brand Image</label>
                            <input type="file" x-ref="input" required wire:model.defer="brandLogo" class="form-control"> 
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:loading.remove wire:target="store" type="submit" class="btn btn-primary">Save</button>
                           
                                <button wire:loading.inline wire:target="store" class="btn btn-primary" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                  </button>
                          </div>
                    </form>
                 </div>
                
              </div>
            </div>
          </div>


    </div>
</div> <!-- Row end  -->
