<div id="ribbon">
    <ol class="breadcrumb">
        <?php echo "<li>" . ucwords($this->module->id) . "</li><li><i class ='typ-icon-arrow-right'></i>" . ucwords(preg_replace('/(?<!\ )[A-Z]/', ' $0', (Settings::get_ControllerID()))) . "</li><li><i class ='typ-icon-arrow-right'></i>" . ucwords(Settings::get_ActionID()) . "</li><i class ='typ-icon-arrow-right'></i>" ?>
        <li class = "homeDashboard"><a href="?r=siteadmin/default/index" title="Dashboard" class="tip"><span class="icon24 icomoon-icon-screen"></span>Dashboard</a></li>
    </ol>
</div>