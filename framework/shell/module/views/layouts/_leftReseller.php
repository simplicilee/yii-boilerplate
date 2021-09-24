<nav>
    <ul>
        <li class="">
            <a href="#"><i class="fa fa-lg fa-fw fa-users"></i><span class="menu-item-parent">Reseller</span></a>
            <ul>
                <li class="<?php print (MessageHeaders::getClassActive()) . ' ' . MessageHeaders::getClassOpen() ?>">
                    <a href="#"><span class="menu-item-parent">Reseller Panel</span></a>
                    <ul>
                        <li class="<?php print Contacts::getClassManageActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Client Management', $this->createUrl('contacts/admin')); ?>
                        </li>
                        <li class="<?php print Contacts::getClassManageGroupActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Dashboard', $this->createUrl('contacts/adminGroup')); ?>
                        </li>
                        <li class="<?php print Contacts::getClassManageGroupActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Currency Table', $this->createUrl('contacts/adminGroup')); ?>
                        </li>
                    </ul>
                </li>
                 <li class="<?php print (MessageHeaders::getClassActive()) . ' ' . MessageHeaders::getClassOpen() ?>">
                    <a href="#"><span class="menu-item-parent">Customization Centre</span></a>
                    <ul>
                        <li class="<?php print Contacts::getClassManageActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> General', $this->createUrl('contacts/admin')); ?>
                        </li>
                        <li class="<?php print Contacts::getClassManageGroupActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Layout & Theme', $this->createUrl('contacts/adminGroup')); ?>
                        </li>
                        <li class="<?php print Contacts::getClassManageActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Contacts', $this->createUrl('contacts/admin')); ?>
                        </li>
                        <li class="<?php print Contacts::getClassManageGroupActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Client App Settings', $this->createUrl('contacts/adminGroup')); ?>
                        </li>
                        <li class="<?php print Contacts::getClassManageActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Documents Zone', $this->createUrl('contacts/admin')); ?>
                        </li>
                        <li class="<?php print Contacts::getClassManageGroupActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Mail Settings', $this->createUrl('contacts/adminGroup')); ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</nav>