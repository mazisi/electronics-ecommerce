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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>                               
                                @if(is_null($product->image))
                                <a href="/view-product?product={{ $product->id }}">
                                    <img src="{{ asset('dashboard/assets/images/product/product-3.jpg') }}" class="avatar lg rounded " 
                                    alt="profile-image">
                                </a>
                                    
                                @else
                                <a href="/view-product?product={{ $product->id }}">
                                    <img src="{{ asset('storage/'.$product->image) }}" class="avatar lg rounded " 
                                    alt="profile-image">
                                </a>
                                @endif
                                <span>{{ $product->name }}</span></td>
                            <td>
                                @if (!is_null($product->category))
                                <span> {{ $product->category->name }} </span>
                                @endif
                                
                            </td>
                            <td>R {{ $product->price }}</td>
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