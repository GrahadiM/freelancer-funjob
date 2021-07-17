<div class="sidebar-menu">
                    <ul class="menu">
                        @if (auth()->user()->role_id == 1)
                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item {{ Request::is('home*') ? 'active' : ''}}">
                            <a href="{{ route('home') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i> 
                                <span>Dashboard</span>
                            </a>
                        </li>
                        {{-- <li class='sidebar-title'>Settings Menu</li>
                        <li class="sidebar-item {{ Request::is('role*') ? 'active' : ''}}">
                            <a href="{{ route('role.index') }}" class='sidebar-link'>
                                <i data-feather="file-text" width="20"></i> 
                                <span>Role</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('status*') ? 'active' : ''}}">
                            <a href="{{ route('status.index') }}" class='sidebar-link'>
                                <i data-feather="file-text" width="20"></i> 
                                <span>Status</span>
                            </a>
                        </li> --}}
                        <li class='sidebar-title'>Address Menu</li>
                        <li class="sidebar-item {{ Request::is('kota*') ? 'active' : ''}}">
                            <a href="{{ route('kota.index') }}" class='sidebar-link'>
                                <i data-feather="layers" width="20"></i> 
                                <span>Kota</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('kecamatan*') ? 'active' : ''}}">
                            <a href="{{ route('kecamatan.index') }}" class='sidebar-link'>
                                <i data-feather="layers" width="20"></i> 
                                <span>Kecamatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('kategori*') ? 'active' : ''}}">
                            <a href="{{ route('kategori.index') }}" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i> 
                                <span>Kategori Jasa</span>
                            </a>
                        </li>
                        @endif
                        <li class='sidebar-title'>Klien Menu</li>
                        <li class="sidebar-item {{ Request::is('jasa*') ? 'active' : ''}}">
                            <a href="{{ route('jasa.index') }}" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i> 
                                <span>Jasa</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('pesanan*') ? 'active' : ''}}">
                            <a href="{{ route('pesanan.index') }}" class='sidebar-link'>
                                <i data-feather="file-text" width="20"></i> 
                                <span>Pesanan</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('komentar*') ? 'active' : ''}}">
                            <a href="{{ route('komentar.index') }}" class='sidebar-link'>
                                <i data-feather="file-text" width="20"></i> 
                                <span>Komentar</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('pesan') ? 'active' : ''}}">
                            <a href="{{ route('pesan.index') }}" class='sidebar-link'>
                                <i data-feather="user" width="20"></i> 
                                <span>Inbox</span>
                            </a>
                        </li>
                    </ul>
                </div>