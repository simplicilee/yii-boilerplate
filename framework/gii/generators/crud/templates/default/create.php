<?php
/**
 * This is the template for generating the create view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>
<div class="col-lg-4">
    <div class="metronicCreate">
        <header>
            <span><i class="iconic-icon-plus-alt"></i>Create - <?php echo $modelClass; ?></span>
            <?php echo "<?php"; ?> print CHtml::link('View/Search',$this->createUrl('<?php echo $modelClass; ?>/admin'), array('class' => 'btn-back')); ?>
        </header>
        <?php echo "<?php"; ?> echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>