<div class="sidebar px-4 py-4 py-md-4 me-0">
  <div class="d-flex flex-column h-100">
      <a href="index.html" class="mb-0 brand-icon">
          <span class="logo-icon">
              <i class="bi bi-bag-check-fill fs-4"></i>
          </span>
          <span class="logo-text">eBazar</span>
      </a>
      <!-- Menu: main ul -->
      <ul class="menu-list flex-grow-1 mt-3">
          <li><a class="m-link active" href="{{ route('dashboard') }}"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
          <li class="collapsed">
              <a class="m-link" href="/admin-products">
                  <i class="icofont-truck-loaded fs-5"></i> <span>Products</span>
                </a>
                 
          </li>
          <li class="collapsed">
              <a class="m-link" href="{{ route('categories') }}">
                  <i class="icofont-chart-flow fs-5"></i> <span>Categories</span></a>
                 
          </li>
          <li class="collapsed">
              <a class="m-link" href="/orders">
              <i class="icofont-notepad fs-5"></i> <span>Orders</span></a>
            </li>
          <li class="collapsed">
              <a class="m-link" href="{{ route('brands') }}">
              <i class="icofont-funky-man fs-5"></i> <span>Brands</span>
            </a>
            </li>
          <li><a class="m-link" href="/logout"><i class="icofont-logout "></i> <span >Logout</span></a></li>
 
      </ul>
      <!-- Menu: menu collepce btn -->
      <button type="button" class="btn btn-link sidebar-mini-btn text-light">
          <span class="ms-2"><i class="icofont-bubble-right"></i></span>
      </button>
  </div>
</div>