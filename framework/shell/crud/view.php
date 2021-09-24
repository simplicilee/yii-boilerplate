<?php
/**
 * This is the template for generating the 'view' view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>
<div class="col-lg-4">
    <div class="metronicView">
        <header>
            <span><i class="minia-icon-search"></i>View - <?php echo $modelClass; ?></span>
            <?php echo "<?php"; ?> print CHtml::link('<i class="brocco-icon-plus"></i>',$this->createUrl('<?php echo $modelClass; ?>/create'), array('class' => 'btn-back', 'data-tooltip' => 'Create')); ?>
            <?php echo "<?php"; ?> print CHtml::link('View/Search', $this->createUrl('<?php echo $modelClass; ?>/admin'), array('class' => 'btn-back')); ?>
        </header>
        <div class ="row">
            <ul class = "col-lg-12 unstyled">
                <?php
                foreach ($columns as $column)
                    if ($column->name == 'is_deleted') {
                    } else {
                        echo '
                        <li>
                            <span class="icon12 typ-icon-arrow-right"></span>
                            <?php print CHtml::activeLabel($model, ' . "'" . $column->name . "'" . '); ?>:
                            <strong> <?php echo $model->' . $column->name . '?></strong>
                        </li> 
                        ';
                    }
                ?>    
            </ul>
        </div>
    </div>
</div>