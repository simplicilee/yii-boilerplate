<?php
/**
 * This is the template for generating the update view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>
<div class="col-lg-4">
    <div class="metronicUpdate">
        <header>
            <span><i class="icomoon-icon-pencil-2"></i>Update - <?php echo $modelClass; ?></span>
            <?php echo "<?php"; ?> print CHtml::link('<i class="brocco-icon-plus"></i>',$this->createUrl('<?php echo $modelClass; ?>/create'), array('class' => 'btn-back', 'data-tooltip' => 'Create')); ?>
            <?php echo "<?php"; ?> print CHtml::link('View/Search',$this->createUrl('<?php echo $modelClass; ?>/admin'), array('class' => 'btn-back')); ?>
        </header>
        <?php echo "<?php"; ?> echo $this->renderPartial('_formUpdate', array('model'=>$model)); ?>
    </div>
</div>