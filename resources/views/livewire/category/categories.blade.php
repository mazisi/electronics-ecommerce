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
                            @if($show_edit_input)
                             <th>Edit</th>
                            @endif
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
                            <td><span class="badge bg-success">25</span></td>

                            @if($show_edit_input)
                                <td>
                                    <input type="text" class="form-control" wire:model.lazy="editname">
                                </td>
                            @endif
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a wire:click="edit('{{ $category->slug }}')"
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