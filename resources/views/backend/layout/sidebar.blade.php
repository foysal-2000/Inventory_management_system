<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('backend.dashboard.create')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
@can('products')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-box-open"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.products.create')}}">
              <i class="bi bi-circle"></i><span>create </span>
            </a>
          </li>
          <li>
            <a href="{{route('backend.products.index')}}">
              <i class="bi bi-circle"></i><span>Index</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-layer-group"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.categories.create')}}">
              <i class="bi bi-circle"></i><span>Create </span>
            </a>
          </li>
          <li>
            <a href="{{route('backend.categories.index')}}">
              <i class="bi bi-circle"></i><span> Index</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-truck-field"></i><span>Supplier</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.supplier.create')}}">
              <i class="bi bi-circle"></i><span>Create </span>
            </a>
          </li>
          <li>
            <a href="{{route('backend.supplier.index')}}">
              <i class="bi bi-circle"></i><span>Index</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-building"></i><span>Company</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.company.create')}}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{route('backend.company.index')}} ">
              <i class="bi bi-circle"></i><span>Index</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-order" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-boxes-packing"></i><span>Product Order</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-order" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.productorder.create')}}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{route('backend.productorder.search')}}">
              <i class="bi bi-circle"></i><span>Search Order </span>
            </a>
          </li>
          <li>
            <a href="{{route('backend.productorder.show-order')}}">
              <i class="bi bi-circle"></i><span>Show Orderd Product </span>
            </a>
          </li>
        </ul>
      </li>
@endcan 
@can('all')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">

          <i class="fa-solid fa-file-invoice"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.inventory.billing')}}">
              <i class="bi bi-circle"></i><span>Billing POS System</span>
            </a>
          </li>
       
          <li>
            <a href="{{route('backend.inventory.index')}}">
              <i class="bi bi-circle"></i><span>sales Index</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-navss" data-bs-toggle="collapse" href="#">

          <i class="fa-solid fa-file-invoice"></i><span>Invoice Items</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-navss" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.invoiceitem.index')}}">
              <i class="bi bi-circle"></i><span>Invoice Item Index</span>
            </a>
          </li>
       
          <li>
            <a href="{{route('backend.invoiceitem.trash')}}">
              <i class="bi bi-circle"></i><span>Deleted Items</span>
            </a>
          </li>
        </ul>
      </li>
@endcan
@can('billing')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-ds" data-bs-toggle="collapse" href="#">

        <i class="fa-solid fa-bag-shopping"></i>Billing POS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-ds" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.inventory.billing')}}">
              <i class="bi bi-circle"></i><span>Inventory Billing System</span>
            </a>
          </li>
        </ul>
      </li>
  @endcan
  @can('all')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-account" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-receipt"></i>Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-account" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.account.create')}}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{route('backend.account.index')}}">
              <i class="bi bi-circle"></i><span>Index</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-customer" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-user-group"></i><span>Customer</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-customer" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.customers.make')}}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{route('backend.customers.index')}}">
              <i class="bi bi-circle"></i><span>Index</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-employee" data-bs-toggle="collapse" href="#">
        <i class="fa-solid fa-users"></i><span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-employee" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.admin.index')}}">
              <i class="bi bi-circle"></i><span>Index</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-profit" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-database"></i><span>Profits</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-profit" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('backend.profit.index')}}">
              <i class="bi bi-circle"></i><span>show Profit</span>
            </a>
          </li>
          <li>
            <a href="{{route('backend.profit.trash')}}">
              <i class="bi bi-circle"></i><span>Deleted Profit</span>
            </a>
          </li>
        </ul>
      </li>
@endcan
@can('all')
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('backend.admin.role_index')}}">
          <i class="fa-solid fa-user-check"></i>
          <span>Role Management</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
@endcan
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('backend.profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->  
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
              @csrf <!-- Add CSRF token for Laravel form submission -->
            <button type="submit" class="nav-link collapsed">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
            </button>
        </form>
      </li>
    </ul>
    
  </aside>