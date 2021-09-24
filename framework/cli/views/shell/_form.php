<?php
/**
 * This is the template for generating the form view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>
<?php echo "<?php"; ?> print CHtml::beginForm('', 'POST', array('id' => 'form-validate', 'class' => 'crud-container'));?>
<?php
foreach ($columns as $column) {
    if ($column->name == 'id' || $column->name == 'created_at' || $column->name == 'updated_at' || $column->name == 'is_deleted') {
        
    } else {
        if ($column->isPrimaryKey)
            continue;
        ?>
        <div class ="col-lg-12">
            <div class="crud-texfield">
                <?php echo "<?php"; ?> echo CHtml::activeLabelEx($model,'<?php echo $column->name ?>'); ?>
                <span class="icomoon-icon-book-2"></span>
                <div class="explicit-field-container">
                    <?php echo "<?php"; ?> echo CHtml::activeTextField($model,'<?php echo $column->name ?>', array('required' => 'required')); ?>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
<div class="crud-footer-button">
    <?php echo "<?php"; ?> echo CHtml::link('Back', $this->createUrl('<?php echo lcfirst($modelClass); ?>/admin'), array('class' => 'btn btn-danger')); ?>
    <?php echo "<?php"; ?> echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Create', array('class' => 'btn btn-success')); ?>
</div>
<?php echo "<?php"; ?> print CHtml::endForm(); ?>
