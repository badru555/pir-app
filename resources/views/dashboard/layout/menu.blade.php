<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content top-navbar">
        <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left sidebar-p-t" data-perfect-scrollbar>

            <!-- Sidebar Content -->
            <div class="sidebar-heading">Menu Utama</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item {{ Request::is('dashboard') ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" href="/dashboard">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                        Beranda
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Request::is('applications*') ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#application_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">apps</span>
                        Aplikasi
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse sm-indent" id="application_menu">
                        <li class="sidebar-menu-item {{ Request::is('applications') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="/applications">
                                <span class="sidebar-menu-text">Daftar</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Request::is('applications/create') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="/applications/create">
                                <span class="sidebar-menu-text">Tambah Baru</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item {{ Request::is('users*') ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#user_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people_outline</span>
                        Pengguna
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse sm-indent" id="user_menu">
                        <li class="sidebar-menu-item {{ Request::is('users') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="/users">
                                <span class="sidebar-menu-text">Daftar</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Request::is('users/create') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="/users/create">
                                <span class="sidebar-menu-text">Tambah Baru</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item {{ Request::is('faqs*') ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#faq_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">message</span>
                        FAQs
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse sm-indent" id="faq_menu">
                        <li class="sidebar-menu-item {{ Request::is('faqs') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="/faqs">
                                <span class="sidebar-menu-text">Daftar</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Request::is('faqs/create') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="/faqs/create">
                                <span class="sidebar-menu-text">Tambah Baru</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item {{ Request::is('applicationdocuments*') ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#document_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">book</span>
                        Dokument PIR
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse sm-indent" id="document_menu">
                        <li class="sidebar-menu-item {{ Request::is('documents') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="/applicationdocuments">
                                <span class="sidebar-menu-text">Daftar</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Request::is('applicationdocuments/create') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="/applicationdocuments/create">
                                <span class="sidebar-menu-text">Buat Baru</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

            <!-- // END Sidebar Content -->

        </div>
    </div>
</div>
