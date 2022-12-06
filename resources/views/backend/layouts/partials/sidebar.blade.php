<div class="sidebar">     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">QUẢN LÝ</li>
          <li class="nav-item">
            <a href="{{ route('admin.quanly.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Quản lý
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.khachhang.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Khách hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.donhang.index') }}" class="nav-link">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Đơn hàng
              </p>
            </a>
          </li>
          <li class="nav-header">DANH MỤC</li>
          <li class="nav-item">
            <a href="{{ route('admin.sanpham.index') }}" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.loai.index') }}" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Loại sản phẩm
              </p>
            </a>
          </li>                   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>