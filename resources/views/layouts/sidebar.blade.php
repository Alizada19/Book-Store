<!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ route('dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('adminlte/dist/assets/img/bookstore.png') }}"
              alt="Book Store"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Book Store</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @role('Admin')
                  <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>User Management
                        </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-person-gear"></i>
                        <p>Assign Roles to user
                        </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-shield-lock"></i>
                        <p>Role Management</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('permissions.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-key-fill"></i>
                        <p>Permissions Management</p>
                    </a>
                  </li>
                  @endrole
                  @auth
                  <li class="nav-item">
                    <a href="{{ route('books.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-book"></i>
                      <p>Book Management</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link">
                      <i class="nav-icon bi-cart-check"></i>
                      <p>Orders</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-folder"></i>
                      <p>Categories</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('profile.show') }}" class="nav-link">
                        <i class="nav-icon bi bi-person-circle"></i>
                        <p>Profile</p>
                    </a>
                  </li>
                  @endauth
                </ul>
              </li>
            
              

            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->