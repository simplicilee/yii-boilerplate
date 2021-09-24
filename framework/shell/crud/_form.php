<?php
/**
 * This is the template for generating the form view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>
<?php echo "<?php"; ?> print CHtml::beginForm('','POST', array('class'=>'smart-form'));?>
<fieldset>
    <div class ="row">
        <?php
        foreach ($columns as $column) {
            if ($column->name == 'id' || $column->name == 'created_at' || $column->name == 'updated_at' || $column->name == 'is_deleted') {
                
            } else {
                if ($column->isPrimaryKey)
                    continue;
                ?>
                <div class ="col-lg-12">
                        <?php echo "<?php"; ?> echo CHtml::activeLabelEx($model,'<?php echo $column->name ?>'); ?>
                    <label class="input"><i class="icon-prepend minia-icon-book"></i>
        <?php echo "<?php"; ?> echo CHtml::activeTextField($model,'<?php echo $column->name ?>'); ?>
                    </label>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="footer-button">
        <?php echo "<?php"; ?> echo CHtml::link('Back', $this->createUrl('<?php echo $modelClass; ?>/admin'), array('class' => 'btn btn-danger btn-sm')); ?>
<?php echo "<?php"; ?> echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',  array('class'=>'btn btn-sm btn-success')); ?>
    </div>
</fieldset>
<?php echo "<?php"; ?> print CHtml::endForm(); ?>
