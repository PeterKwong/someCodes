<header id="topnav">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>
                <li>
                    <form method="get" action="/adm/theme">
                        <input type="hidden" name="theme" value="light">
                        <button class="btn btn-outline-primary" >Switch Theme</button>
                    </form>
                </li>
                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
    
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell noti-icon"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="/admin/assets/images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="/admin/assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="/admin/assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            Nowak <i class="mdi mdi-chevron-down"></i> 
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="/logout" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo text-center">
                    <span class="logo-lg">
                        <img src="/front_end/company/logo_PNG_sq_60x60.png" alt="" height="50">
                        <!-- <span class="logo-lg-text-light">UBold</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">U</span> -->
                        <img src="/front_end/company/logo_PNG_sq_60x60.png" alt="" height="60">
                    </span>
                </a>
            </div>

        </div> <!-- end container-fluid-->
    </div>
    <!-- end Topbar -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="/adm/invoices"> 
                          <i class="mdi mdi-invert-colors"></i>Invoices<div class="arrow-down"></div>
                        </a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="/adm/invoices">Invoices <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/adm/invoices">Show</a>
                                    </li>
                                    <li>
                                        <a href="/adm/invoices/create">Create</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="/adm/customers">Customers <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/adm/customers">Show</a>
                                    </li>
                                    <li>
                                        <a href="/adm/customers/create">Create</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="/adm/invoice-diamonds">Invoice diamonds <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/adm/invoice-diamonds">Show</a>
                                    </li>
                                    <li>
                                        <a href="/adm/invoice-diamonds/create">Create</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="/adm/orders">
                            <i class="mdi mdi-lifebuoy"></i>Orders <div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="/adm/orders">Orders <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/adm/orders">Show</a>
                                    </li>
                                </ul>
                            </li>                
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="/adm/diamonds">
                            <i class="mdi mdi-lifebuoy"></i>Diamonds <div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="/adm/diamonds">Diamonds <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/adm/diamonds">Show</a>
                                    </li>
                                    <li>
                                        <a href="/adm/diamonds/create">Create</a>
                                    </li> 
                                    <li>
                                        <a href="/adm/purchase/starred-diamonds-export">Export Diamonds</a>
                                    </li>     
                                    <li>
                                        <a href="/adm/diamonds/batch-create">Btach Create</a>
                                    </li> 
                                    <li>
                                        <a href="/adm/diamonds/disc-price">Tag Price</a>
                                    </li>                                   
                                </ul>
                            </li>                
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="/adm/engagement-rings">
                            <i class="mdi mdi-chart-donut-variant"></i>Engagement Rings <div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="/adm/engagement-rings">Engagement Rings <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/adm/engagement-rings">Show</a>
                                    </li>
                                    <li>
                                        <a href="/adm/engagement-rings/create">Create</a>
                                    </li>                                    
                                </ul>
                            </li>                
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="/adm/wedding-rings">
                            <i class="mdi mdi-cards-outline"></i>Wedding Rings <div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="/adm/wedding-rings">Wedding Rings <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/adm/wedding-rings">Show</a>
                                    </li>
                                    <li>
                                        <a href="/adm/wedding-rings/create">Create</a>
                                    </li>                                    
                                </ul>
                            </li>                
                        </ul>
                    </li>                               


                    <li class="has-submenu">
                        <a href="/adm/jewellery">
                            <i class="mdi mdi-card-bulleted-settings-outline"></i>Jewellery <div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="/adm/jewellery">Jewellery <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/adm/jewellery">Show</a>
                                    </li>
                                    <li>
                                        <a href="/adm/jewellery/create">Create</a>
                                    </li>                                    
                                </ul>
                            </li>                
                        </ul>
                    </li>                               

                    <li class="has-submenu">
                        <a href="/adm/customer-jewelleries">
                            <i class="mdi mdi-cards-outline"></i>Customer Corner <div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="/adm/customer-jewelleries">Customer Jewelleries <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/adm/customer-jewelleries">Show</a>
                                    </li>
                                    <li>
                                        <a href="/adm/customer-jewelleries/create">Create</a>
                                    </li>                                    
                                </ul>
                            </li>                
                            <li class="has-submenu">
                                <a href="/adm/customer-moments">Customer Moments <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/adm/customer-moments">Show</a>
                                    </li>
                                    <li>
                                        <a href="/adm/customer-moments/create">Create</a>
                                    </li>                                    
                                </ul>
                            </li>                
                        </ul>                        
                    </li> 

                    @include('layouts.backEnd.extra')


                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->

</header>


