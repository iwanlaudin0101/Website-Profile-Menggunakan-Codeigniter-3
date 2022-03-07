<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img style="height: 5rem; width: 5rem" src="<?= base_url("images/user/$user->image") ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $user->username; ?></p>
                <a href="#"><i class="fa fa-circle <?= $user->is_active ? 'text-success' : 'text-danger' ?> "></i><?= $user->is_active ? 'Online' : 'Ofline' ?></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="<?= base_url('about/index') ?>"><i class="fa fa-cog"></i> <span>About Me</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open"></i> <span>Portofolio</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('portofolio/add') ?>"><i class="fa fa-circle-o text-info"></i> Add</a></li>
                    <li><a href="<?= base_url('portofolio/index') ?>"><i class="fa fa-circle-o text-info"></i> My Portofolio</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open"></i> <span>Event</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('event/add') ?>"><i class="fa fa-circle-o text-info"></i> Add</a></li>
                    <li><a href="<?= base_url('event/index') ?>"><i class="fa fa-circle-o text-info"></i> My Event</a></li>
                </ul>
            </li>
            <li><a href="<?= base_url('category/index') ?>"><i class="fa fa-folder-open"></i> <span>Kategori</span></a></li>
            <li class="header">USER</li>
            <?php if ($user->role === 'admin') : ?>
                <li><a href="<?= base_url('user/index') ?>"><i class="fa fa-user"></i> <span>User</span></a></li>
            <?php endif; ?>
            <?php if ($user->role === 'editor') : ?>
                <li><a href="<?= base_url('user/profile') ?>"><i class="fa fa-pencil"></i> <span>User Profile</span></a></li>
            <?php endif; ?>
            <li class="header">LOGOUT</li>
            <li><a href="<?= base_url('logout') ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
    </section>
</aside>