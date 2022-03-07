<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>D</b>EV</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>DEV</b>one</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#">
                                <img src="<?= base_url("images/user/$user->image") ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $user->username; ?></span>
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>