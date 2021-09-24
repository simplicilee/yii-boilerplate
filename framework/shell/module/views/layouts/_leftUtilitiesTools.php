<nav>
    <ul>
        <li class="">
            <a href="#"><i class="fa fa-lg fa-fw fa-wrench"></i><span class="menu-item-parent">Utilities & Tools</span></a>
            <ul class="ulBackground">
                <li class="<?php print (MessageHeaders::getClassActive()) . ' ' . MessageHeaders::getClassOpen() ?>">
                    <a href="#"><i class ="minia-icon-book"></i><span class="menu-item-parent">Address Book</span></a>
                    <ul>
                        <li class="<?php print Contacts::getClassManageActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Contacts', $this->createUrl('contacts/admin')); ?>
                        </li>
                        <li class="<?php print Contacts::getClassManageGroupActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Groups', $this->createUrl('contacts/adminGroup')); ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</nav>