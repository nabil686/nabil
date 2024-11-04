<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
          @if(checkPermission('dashboard'))
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                {{__('Dashboard')}}
              </a>
            </li>
            @endif

            @if(checkPermission('admin.order'))
            <li class="nav-item">

              <a class="nav-link d-flex align-items-center gap-2" href="">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Orders
              </a>

            </li>
            @endif

           
            
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('category.list')}}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Category
              </a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('product.list')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('role.list')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Role
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('user.list')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                User
              </a>
            </li>
        
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('customer.list')}}">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Customers
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="">
                <svg class="bi"><use xlink:href="#graph-up"/></svg>
                Reports
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('logout')}}">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>