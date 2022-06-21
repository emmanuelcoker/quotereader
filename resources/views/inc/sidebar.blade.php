  <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed" style="background-color:black;" data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="#" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{asset('src/images/logo.png')}}" srcset="{{asset('src/images/logo2x.png')}} 2x" alt="logo">
                            <img class="logo-dark logo-img" src="{{asset('src/images/logo-dark.png')}}" srcset="{{asset('src/images/logo-dark2x.png')}} 2x" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link text-white">
                                        <span class="nk-menu-icon"><em class="icon ni ni-home text-white"></em></span>
                                        <span class="nk-menu-text">Home</span>
                                    </a>
                                </li>

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle text-white">
                                        <span class="nk-menu-icon"><em class="icon ni ni-book text-white"></em></span>
                                        <span class="nk-menu-text">Quotes</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="/admin/quotes/all" class="nk-menu-link">
                                                <span class="nk-menu-text">All Quotes</span></a>
                                        </li>

                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item has-sub text-white">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-box text-white"></em></span>
                                        <span class="nk-menu-text text-white">Categories</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="/admin/categories/all" class="nk-menu-link">
                                                <span class="nk-menu-text ">All Categories</span></a>
                                        </li>
                    
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item has-sub text-white">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-pen text-white"></em></span>
                                        <span class="nk-menu-text text-white">Authors</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="/admin/author/all" class="nk-menu-link">
                                                <span class="nk-menu-text ">All Authors</span></a>
                                        </li>
                                    
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->


                                <li class="nk-menu-item has-sub text-white">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users text-white"></em></span>
                                        <span class="nk-menu-text text-white">Users</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="/admin/users" class="nk-menu-link"><span class="nk-menu-text">Manage Users</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->