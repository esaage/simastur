<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU APLIKASI</li>
        <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview {{ request()->is('admin/jalan') ? 'menu-open' : '' }}">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: {{ request()->is('admin/jalan') ? 'block' : '' }}">
            <li class="{{ request()->is('admin/jalan') ? 'active' : '' }}"><a href="/admin/jalan"><i class="fa fa-circle-o"></i> Jalan</a></li>
            {{-- <li><a href="/admin/irigasi"><i class="fa fa-circle-o"></i> Irigasi</a></li>
            <li><a href="/admin/tps"><i class="fa fa-circle-o"></i> TPS</a></li> --}}
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>