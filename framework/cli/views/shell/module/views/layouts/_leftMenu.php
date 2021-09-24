<nav>
    <ul>
        <li class="<?php print (Defaults::getClassActive()); ?>">
            <?php print CHtml::link('<i class=\'fa fa-lg fa-fw fa-home\'></i><span class="menu-item-parent">Dashboard</span>', $this->createUrl('default/index'), array('title' => 'Dashboard', 'class' => 'menu-item-parent'));
            ?>
        </li>
    </ul>
</nav>