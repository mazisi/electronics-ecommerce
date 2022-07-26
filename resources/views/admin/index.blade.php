@extends('admin.layouts.app')
@section('content')
  
<div class="body d-flex py-3">
  <div class="container-xxl">

      <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
          <div class="col">
              <div class="alert-success alert mb-0">
                  <div class="d-flex align-items-center">
                      <div class="avatar rounded no-thumbnail bg-success text-light"><i class="fa fa-dollar fa-lg"></i></div>
                      <div class="flex-fill ms-3 text-truncate">
                          <div class="h6 mb-0">Revenue</div>
                          <span class="small">$18,925</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="alert-danger alert mb-0">
                  <div class="d-flex align-items-center">
                      <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="fa fa-credit-card fa-lg"></i></div>
                      <div class="flex-fill ms-3 text-truncate">
                          <div class="h6 mb-0">Expense</div>
                          <span class="small">$11,024</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="alert-warning alert mb-0">
                  <div class="d-flex align-items-center">
                      <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa fa-smile-o fa-lg"></i></div>
                      <div class="flex-fill ms-3 text-truncate">
                          <div class="h6 mb-0">Happy Clients</div>
                          <span class="small">8,925</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="alert-info alert mb-0">
                  <div class="d-flex align-items-center">
                      <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                      <div class="flex-fill ms-3 text-truncate">
                          <div class="h6 mb-0">New StoreOpen</div>
                          <span class="small">8,925</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="row g-3 mb-3 row-deck">
          <div class="col-lg-4 col-md-12">
              <div class="card">
                  <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                      <h6 class="m-0 fw-bold">Active Users Status</h6>
                  </div>
                  <div class="card-body">
                      <div class="p-4 active-user bg-lightblue rounded-2 mb-2">
                          <span class="fw-bold d-flex justify-content-center fs-3">1345</span>
                      </div>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                              <tr>
                                  <th scope="col">Active pages</th>
                                  <th scope="col">Users</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td><a href="#">/dist/product.html</a></td>
                                  <td>245</td>
                              </tr>
                              <tr>
                                  <td><a href="#">/dist/product-cart.html</a></td>
                                  <td>455</td>
                              </tr>
                              <tr>
                                  <td><a href="#">/dist/admin-profile.html</a></td>
                                  <td>45</td>
                              </tr>
                              <tr>
                                  <td><a href="#">/dist/order-history.html</a></td>
                                  <td>545</td>
                              </tr>
                              <tr>
                                  <td><a href="#">/dist/product-detail.html</a></td>
                                  <td>55</td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-8 col-md-12">
              <div class="card">
                  <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                      <h6 class="m-0 fw-bold">Avg Expense Costs</h6>
                  </div>
                  <div class="card-body">
                      <div class="h2 mb-0">$1105.5</div>
                      <span class="text-muted small">Avg Expense Costs All Month</span>
                      <div id="apex-expense"></div>  
                  </div>
              </div>
          </div>
      </div><!-- Row end  -->

    
  </div>
</div>
@endsection