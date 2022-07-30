<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Categories</h3>

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
                <a data-bs-toggle="modal" data-bs-target="#add-category"
                 href="#!" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100">
                  <i class="icofont-plus-circle me-2 fs-6"></i> Add Category</a>
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
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Date</th>
                                <th>Products</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            @php
                                $i++
                            @endphp
                            <tr>
                                <td><strong>{{ $i }}</strong></td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->format('d-m-Y') }}</td>
                                <td><span class="badge bg-success">{{ $category->products->count() }}</span></td>
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a wire:click="edit('{{ $category->slug }}')" data-bs-toggle="modal" data-bs-target="#editCategory"
                                    href="#!" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
                                    <button x-data onclick="return confirm('All related products will be deleted too!! Continue ??') ? @this.destroy('{{ $category->slug }}') : false" 
                                    type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                </div>
                                </td>
                            </tr>
    
                            @empty
                            <tr>
                                <td></td>
                                <td></td>
                                <td><h6 class="text-danger">No categories found.</h6></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                    <div class="float-end mt-2">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div wire:ignore class="modal fade" id="add-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Create Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="col-md-12">
                            <label for="add-categ" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="add-categ" required wire:model.defer="name">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:loading.remove wire:target="store" type="submit" class="btn btn-primary">Save</button>
                           
                                <button wire:loading wire:target="store" class="btn btn-primary" type="button" disabled>
                                    <i class="fa fa-spinner fa-spin "></i>
                                  </button>
                          </div>
                    </form>
                 </div>
                
              </div>
            </div>
          </div>
          
    
          <div wire:ignore class="modal fade right" id="editCategory" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog  modal-sm">
                <form wire:submit.prevent='update' class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body custom_setting">
                        <input type="text" class="form-control" wire:model.lazy="editname">
                    </div>
                    
                    <div class="modal-footer justify-content-start">
                        <button type="button" class="btn btn-white border lift" data-bs-dismiss="modal">Close</button>
                        <button wire:loading.remove wire:target='update' type="submit" class="btn btn-primary lift">Save Changes</button>
                        <button wire:loading wire:target='update' type="button" class="btn btn-primary lift"><i class="fa fa-spinner fa-spin "></i></button>
                    </div>
                </form>
            </div>
        </div>
      </div>
</div>



