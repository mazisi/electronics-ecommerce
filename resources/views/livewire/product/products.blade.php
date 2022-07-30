<div class="container-xxl"> 
    <div class="row align-items-center"> 
        <div class="border-0 mb-4"> 
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Product List</h3>
                @if (session()->has('success'))
                
                    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
                        <div class="alert alert-success" role="alert" >
                            {{ session('success') }}
                        </div>
                    </div>

                    @elseif(session()->has('error'))
                    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                        <div class="alert alert-success" role="alert" >
                            {{ session('error') }}
                        </div>
                    </div>
                    @endif
                    
                <a data-bs-toggle="modal" data-bs-target="#upload-products"
                 href="#!" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100">
                  <i class="icofont-plus-circle me-2 fs-6"></i> Upload Products</a>
            </div>
        </div>
    </div> <!-- Row end  -->
    <div class="row g-3 mb-3"> 
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-body"> 
                    <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Pack Size</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>                               
                                    
                                    <a href="/view-product?product={{ $product->id }}">
                                        @if(is_null($product->image))
                                        <img src="{{ asset('assets/images/no-image.JPG') }}" class="avatar lg rounded " 
                                        alt="profile-image">
                                        @else
                                        <img src="{{ asset('storage/'.$product->image) }}" class="avatar lg rounded " 
                                            alt="profile-image">
                                        @endif
                                    </a>
                                    
                                    <span>{{ $product->name }}</span></td>
                                <td>
                                    @if (!is_null($product->category))
                                    <span> {{ $product->category->name }} </span>
                                    @endif
                                    
                                </td>
                                <td>R {{ $product->price }}</td>
                                <td>{{ $product->packsize }}</td>
                                <td>
                                    @if ($product->visibility == 1)
                                    <span class="badge bg-success">In Stock</span>
                                    @else
                                    <span class="badge bg-warning">Out Of Stock</span>
                                    @endif
                                </td>
                                <td class=" dt-body-right">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="/view-product?product={{ $product->id }}" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
                                        <button x-data onclick="return confirm('{{ $product->name }}' + ' will be removed!! Continue ??') ? @this.destroy('{{ $product->id }}') : false" 
                                             type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                                
                            @empty
                            <tr>
                                <td></td><td></td>
                                <td><h6 class="text-danger">No products found.</h6></td>
                                <td></td><td></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="float-end mt-2">
                        {{ $products->links() }}
                    </div>
                    </div>
                
            </div>
        </div>
        <div wire:ignore class="modal fade" id="upload-products" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Upload Products</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Choose Category</label>
                                <select class="form-control" wire:model.defer='category_id'>
                                    <option value="">-- Select Category --</option>
                                    @forelse ($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                    
                                    @endforelse
                                    
                                </select>
                            </div>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="col-md-12 py-3"
                        wire:ignore
                        x-data
                        x-init="
                        FilePond.setOptions({
                        allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
                        server: {
                        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        @this.upload('excel_document',file, load, error, progress)
                        },
                        revert: (filename, load) =>{
                        @this.removeUpload('excel_document', filename, load)
                        },
                        },
                        });
                        FilePond.create($refs.input);"
                        >
                            <label for="add-categ" class="form-label">Attach Excel File
                            <span class="text-success" style="margin-left: 10rem;">Tick If First Row header? 
                                <input class="form-check-input" type="checkbox" value="1" wire:model.defer='is_document_header'></span>
                            </label>
                            <input type="file" x-ref="input" class="form-control" id="add-categ" required wire:model.defer="excel_document">
                            @error('excel_document')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:loading.remove wire:target="store" type="submit" class="btn btn-primary">Save</button>
                            <div wire:loading.inline wire:target="store">
                                <button wire:target="store" class="btn btn-primary" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                  </button>
                            </div>
                          </div>
                    </form>
                 </div>
                
              </div>
            </div>
          </div>
    
    </div> 
</div>



