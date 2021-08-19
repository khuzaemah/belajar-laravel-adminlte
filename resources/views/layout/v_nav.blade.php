
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ request()->is('/') ? 'active' : ''}}" ><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="{{ request()->is('dosen') ? 'active' : ''}}"><a href="/dosen"><i class="fa fa-book"></i> <span>Dosen</span></a></li>
        <li class="{{ request()->is('mahasiswa') ? 'active' : ''}}"><a href="/mahasiswa"><i class="fa fa-book"></i> <span>Mahasiswa</span></a></li>
        <li class="{{ request()->is('user') ? 'active' : ''}}"><a href="/user"><i class="fa fa-book"></i> <span>User</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Guest</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ request()->is('guest') ? 'active' : ''}}"><a href="/guest"><i class="fa fa-circle-o"></i> <span>Pelanggan 1</span></a></li>
            <li class="{{ request()->is('guest') ? 'active' : ''}} "><a href="/guest"><i class="fa fa-circle-o"></i> <span>Pelanggan 2</span></a></li>
          </ul>
        </li>
        
      </ul>