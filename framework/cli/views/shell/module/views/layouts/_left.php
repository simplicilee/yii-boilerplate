<aside id="left-panel">
    <div class="shortcuts">
        <ul>                                                                                                                  
            <li><a href="#" title="Customer" class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
            <li><a href="<?php print settings::get_baseUrl(); ?>/?r=siteadmin/contacts/addressBook" title="Address Book" class="tip"><span class="icon24 minia-icon-book"></span></a></li>   
            <li><a href="<?php print settings::get_baseUrl(); ?>/?r=siteadmin/country/admin" title="Price List & Coverage" class="tip"><span class="icon24 iconic-icon-chart"></span></a></li>       
            <li><a href="#" title="User Settings" class="tip"><span class="icon24 icomoon-icon-user-3"></span></a></li>
        </ul>
    </div>
    <div class="login-info">
        <span>
            <a id="show-shortcut" data-action="">
                <i class ="icomoon-icon-user-2"></i>
                <span>
                    <?php print Settings::get_Username(); ?> 
                </span>
            </a> 
        </span>
    </div>
    <?php $this->renderPartial('/layouts/_leftMessaging'); ?>
    <?php $this->renderPartial('/layouts/_leftUtilitiesTools'); ?>
    <?php $this->renderPartial('/layouts/_leftSettings'); ?>
</aside>