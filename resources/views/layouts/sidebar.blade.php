<div class="sidebar-brand"> <!--begin::Brand Link--> <a href="" class="brand-link"> <!--begin::Brand Image--> <img src="{{asset('img/AdminLogo.png')}}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">ระบบกองบุญออนไลน์</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                @if ( Auth::user()->role == 1 )<!-- Super Admin -->
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item"> <a href="/super-admin/dashboard" class="nav-link {{ $menu == 'dashboard' ? 'active' : '' }}"> <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a> </li>
                        <li class="nav-item"> <a href="/super-admin/campaigns" class="nav-link {{ $menu == 'campaigns' ? 'active' : '' }}"> <i class="bi bi-card-list"></i>
                            <p>จัดการกองบุญ</p>
                        </a> </li>
                        <li class="nav-item"> <a href="/super-admin/categories" class="nav-link {{ $menu == 'categories' ? 'active' : '' }}"> <i class="bi bi-megaphone"></i>
                            <p>จัดการหัวข้อกองบุญ</p>
                        </a> </li>
                        <li class="nav-item"> <a href="/super-admin/qrcode" class="nav-link {{ $menu == 'qrcode' ? 'active' : '' }}"> <i class="bi bi-qr-code"></i>
                            <p>สร้าง QR CODE</p>
                        </a> </li>
                        <li class="nav-item"> <a href="/super-admin/users" class="nav-link {{ $menu == 'users' ? 'active' : '' }}"> <i class="bi bi-person-lines-fill"></i>
                            <p>จัดการสมาชิก</p>
                        </a> </li>
                    </ul>
                </nav>
                @elseif ( Auth::user()->role == 2 ) <!-- Admin -->
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item"> <a href="/admin/dashboard" class="nav-link {{ $menu == 'dashboard' ? 'active' : '' }}"> <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a> </li>
                        <li class="nav-item"> <a href="/admin/campaigns" class="nav-link {{ $menu == 'campaigns' ? 'active' : '' }}"> <i class="bi bi-card-list"></i>
                            <p>จัดการกองบุญ</p>
                        </a> </li>
                        <li class="nav-item"> <a href="/admin/categories" class="nav-link {{ $menu == 'categories' ? 'active' : '' }}"> <i class="bi bi-megaphone"></i>
                            <p>จัดการหัวข้อกองบุญ</p>
                        </a> </li>
                        <li class="nav-item"> <a href="/admin/qrcode" class="nav-link {{ $menu == 'qrcode' ? 'active' : '' }}"> <i class="bi bi-qr-code"></i>
                            <p>สร้าง QR CODE</p>
                        </a> </li>
                    </ul>
                </nav>
                @endif
            </div> <!--end::Sidebar Wrapper-->