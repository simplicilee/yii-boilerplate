<nav>
    <ul>
        <li class="">
            <a href="#"><i class="fa fa-lg fa-fw fa-comments"></i><span class="menu-item-parent">Messaging</span></a>
            <ul class ="ulBackground">
                <li class="<?php print MessageHeaders::getClassQuickActive() ?>">
                    <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Quick SMS', $this->createUrl('messageHeaders/newQuick')); ?>
                </li>
                <li class="<?php print MessageHeaders::getClassProfessionalSmsActive() ?>">
                    <?php print CHtml::link('<i class ="minia-icon-file-add"></i> Professional SMS', $this->createUrl('messageHeaders/newProfessionalSms')); ?>
                </li>
<!--                <li class="<?php //print (MessageHeaders::getClassActive()) . ' ' . MessageHeaders::getClassOpen() ?>">
                    <a href="#"><i class ="icomoon-icon-mail"></i><span class="menu-item-parent">Professional SMS</span></a>
                    <ul>
                        <li class="<?php //print MessageHeaders::getClassProfessionalManualActive() ?>">
                            <?php //print CHtml::link('<i class ="minia-icon-file-add"></i>Paste / Manual Input', $this->createUrl('messageHeaders/newProfessionalManual')); ?>
                        </li>
                        <li class="<?php //print MessageHeaders::getClassProfessionalContactActive() ?>">
                            <?php //print CHtml::link('<i class ="minia-icon-file-add"></i>Contacts', $this->createUrl('messageHeaders/newProfessionalContact')); ?>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </li>
    </ul>
</nav>