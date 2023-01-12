<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/asaicon.png') }}">
    <!-- Page Title  -->
    <title>ASA Philippines Foundation Inc.</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.0') }}">
    @stack("styles")
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{ asset('images/asaicon.png') }}" srcset="./images/asaicon.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="{{ asset('images/asaicon.png') }}" srcset="./images/asaicon.png 2x" alt="logo-dark">
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Main</h6>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('dashboard') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                @if(auth()->user()->role == "admin")
                                <li class="nk-menu-item">
                                    <a href="{{ route('lenders.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Users</span>
                                    </a>
                                </li>
                                @endif
                                @if(auth()->user()->role != "loaner")
                                <li class="nk-menu-item">
                                    <a href="{{ route('clients.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                        <span class="nk-menu-text">Clients</span>
                                    </a>
                                </li>
                                @endif
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Transactions</h6>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('loans.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-wallet"></em></span>
                                        <span class="nk-menu-text">Records</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('payments.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                        <span class="nk-menu-text">Payments</span>
                                    </a>
                                </li>
                                    
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">
                                    <a class="nk-news-item" href="#">
                                 
                                    </a>
                                </div>
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    @if(auth()->user()->role == "admin")
                                                    <div class="user-status">Administrator</div>
                                                    <div class="user-name dropdown-indicator">Administrator</div>
                                                    @elseif (auth()->user()->role == "loaner")
                                                    <div class="user-status">Client</div>
                                                    <div class="user-name dropdown-indicator">{{ auth()->user()->full_name }}</div>
                                                    @elseif (auth()->user()->role == "lender")
                                                    <div class="user-status">Lender</div>
                                                    <div class="user-name dropdown-indicator">{{ auth()->user()->full_name }}</div>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>US</span>
                                                    </div>
                                                    <div class="user-info">
                                                        @if(auth()->user()->role == "admin")
                                                        <span class="lead-text">Administrator</span>
                                                        @else
                                                        <span class="lead-text">{{ auth()->user()->full_name }}</span>
                                                        @endif
                                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="javascript:void()" onclick="logout()"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                                <form action="{{ route("logout") }}" method="POST" id="logoutForm">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->

                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @yield("content")
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">

                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js?ver=3.0.0') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.0.0') }}"></script>
    <script src="{{ asset('assets/js/charts/gd-default.js?ver=3.0.0') }}"></script>
    @stack("scripts")
    <script>
		function logout(){
			document.getElementById("logoutForm").submit();
		}
	</script>
</body>

</html>