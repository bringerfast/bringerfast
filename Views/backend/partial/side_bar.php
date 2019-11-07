<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?php $user = $_SESSION['CurrentUserData']; echo isset($user['name']) ? $user['name']: 'User Name'; ?></p>
            <p class="app-sidebar__user-designation"><?php echo isset($user['role_name']) ? $user['role_name']: 'Role Name'; ?></p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="<?php echo baseURL().'/dashboard'; ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">User <?php if (is_authorised('SuperAdmin')) { echo '& Role';} ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?php echo baseURL().'/userIndex' ?>"><i class="icon fa fa-circle-o"></i> Users</a></li>
                <?php if (is_authorised('SuperAdmin')) { ?>
                <li><a class="treeview-item" href="<?php echo baseURL().'/roleIndex' ?>"><i class="icon fa fa-circle-o"></i> Roles</a></li>
                <?php } ?>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-video-camera"></i><span class="app-menu__label">Movies & Category</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?php echo baseURL().'/movieIndex' ?>"><i class="icon fa fa-circle-o"></i> Movies</a></li>
                <li><a class="treeview-item" href="<?php echo baseURL().'/movieCategoryIndex' ?>"><i class="icon fa fa-circle-o"></i> Categories</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-film"></i><span class="app-menu__label">Theaters Setup</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?php echo baseURL().'/theatreIndex' ?>"><i class="icon fa fa-circle-o"></i> Theaters</a></li>
                <li><a class="treeview-item" href="<?php echo baseURL().'/classTypeIndex' ?>"><i class="icon fa fa-circle-o"></i> Classe Type</a></li>
                <li><a class="treeview-item" href="<?php echo baseURL().'/showIndex' ?>"><i class="icon fa fa-circle-o"></i> Shows</a></li>
                <li><a class="treeview-item" href="<?php echo baseURL().'/screenIndex' ?>"><i class="icon fa fa-circle-o"></i> screens</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="<?php echo baseURL().'/movieOfScreenIndex'; ?>"><i class="app-menu__icon fa fa-hourglass"></i><span class="app-menu__label">Movie Of Screen</span></a></li>
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Booking Details</span></a></li>
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Payments</span></a></li>
        <?php if (is_authorised('SuperAdmin')) { ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">System</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Memory Usage</a></li>
                <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Error Logs</a></li>
                <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Documentation</a></li>
                <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Setting</a></li>
            </ul>
        </li>
        <?php } ?>
    </ul>
</aside>