<!-- Side Navigation -->
<div class="content-side content-side-full">
    <ul class="nav-main">

        <li class="nav-main-heading"><span class="sidebar-mini-visible">DS</span><span class="sidebar-mini-hidden">Dosen</span></li>
        <li>
            <a href="{{ url(['for':'ipd-admin-dosen']) }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Daftar Dosen</span></a>
        </li>
        <li id="sidebar-dosen">
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-puzzle"></i><span class="sidebar-mini-hide">Kuisioner</span></a>
            <ul>
                <li>
                    <a id="sidebar-dosen-create" href="{{ url(['for':'ipd-admin-dosen-create']) }}">Tambah Soal & Jawaban</a>
                </li>
                <li>
                    <a id="sidebar-dosen-list" href="{{ url(['for':'ipd-admin-dosen-list']) }}">Daftar Soal & Jawaban</a>
                </li>
            </ul>
        </li>
        <li class="nav-main-heading"><span class="sidebar-mini-visible">MK</span><span class="sidebar-mini-hidden">Mata Kuliah</span></li>
        <li>
            <a href="{{ url(['for':'ipd-admin-matkul']) }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Daftar Matkul</span></a>
        </li>
        <li id="sidebar-matkul" >
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-puzzle"></i><span class="sidebar-mini-hide">Kuisioner</span></a>
            <ul>
                <li>
                    <a id="sidebar-matkul-create" href="{{ url(['for':'ipd-admin-matkul-create']) }}">Tambah Soal & Jawaban</a>
                </li>
                <li>
                    <a id="sidebar-matkul-list" href="{{ url(['for':'ipd-admin-matkul-list']) }}">Daftar Soal & Jawaban</a>
                </li>
            </ul>
        </li>    
    </ul>
</div>
<!-- END Side Navigation -->