<!-- HEADER -->
<header id="header">
    <div id="logo-group"  >
        <span><a href ="?r=siteadmin/default/index">TRANZEND<sup>SOLUTIONS</sup></a></span>               
    </div>
    <div class="pull-right">
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
        </div>
        <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
            <li class="">
                <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
                    <img src="<?php print Settings::get_baseUrl(); ?>/smartadmin/img/avatars/sunny.png" alt="John Doe" class="online" />  
                </a>
                <ul class="dropdown-menu pull-right">
                    <li class="divider"></li>
                    <li>
                        <a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
                    </li>
                </ul>
            </li>
        </ul>
        <div id="logout" class="btn-header transparent pull-right">
            <span>
                <?php print CHtml::link('<i class="fa fa-sign-out"></i>', $this->createUrl('/site/logout'), array('data-logout-msg' => 'You can improve your security further after logging out by closing this opened browser', 'data-action' => 'userLogout')); ?>
            </span>
        </div>
        <div id="fullscreen" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
        </div>
        <ul class="header-dropdown-list hidden-xs">
        </ul>
    </div>
</header>
<!-- END HEADER -->