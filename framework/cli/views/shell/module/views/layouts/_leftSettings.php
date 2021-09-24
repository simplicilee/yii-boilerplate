<nav>
    <ul>
        <li class="">
            <a href="#"><i class="fa fa-lg fa-fw fa-gear"></i><span class="menu-item-parent">Settings</span></a>
            <ul class ="ulBackground">
                <li class="<?php print (Users::getClassActive()) . ' ' . Users::getClassOpen() . ' ' . Users::getClassChangePasswordActive(); ?>">
                    <a href="#"><i class ="entypo-icon-users"></i><span class="menu-item-parent">User</span></a>
                    <ul>
                        <?php $model = Users::model_getAccountType_byUserID(Settings::get_UserID()); ?>
                        <?php if ($model == Utilities::YES): ?>
                            <li class="<?php print Users::getClassNewActive() ?>">
                                <?php print CHtml::link('<i class ="minia-icon-file-add"></i>New', $this->createUrl('users/create')); ?>
                            </li>
                            <li class="<?php print Users::getClassManageActive() ?>">
                                <?php print CHtml::link('<i class ="minia-icon-file-add"></i>Manage', $this->createUrl('users/admin')); ?>
                            </li>
                        <?php endif; ?>
                        <li class="<?php print Users::getClassChangePasswordActive() ?>">
                            <?php print CHtml::link('<i class ="minia-icon-file-add"></i>Change Password', $this->createUrl('users/changePassword', array('id' => Settings::get_UserID()))); ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</nav>