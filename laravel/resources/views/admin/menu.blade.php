<li class="header">MAIN MENU</li>
<li class="{{ (empty(Request::segment(2))) ? 'active' : '' }}">
    <a href="{{ route('admin') }}">
        <i class="fa fa-dashboard"></i> <span>Beranda</span>
    </a>
</li>
<li class="treeview {{ (Request::segment(2) == 'tu') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-book"></i> <span>Master Data</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="index2.html"><i class="fa fa-circle-o"></i> Kepala Sekolah</a></li>
        <li class="{{ (Request::segment(2) == 'tu') ? 'active' : '' }}"><a href="{{ route('admin.tu') }}"><i class="fa fa-circle-o"></i> TU</a></li>
        <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Siswa</a></li>
    </ul>
</li>