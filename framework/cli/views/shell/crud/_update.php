<?php
/**
 * This is the template for generating the form view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>
<input class="modal-state" id="modal-ajax-update" type="checkbox" />
<div class="modal">
    <label class="modal-background" for="modal-ajax-update"></label>
    <div class="modal-inner-xs">
        <?php print "<?php " ?> print CHtml::link('<span class ="minia-icon-close modal-close-button"></span>', '', array('onclick' => 'showHideModal("modal-ajax-update", false)' )) ?>
        <div class ="modal-crud-container">
            <div class ="modal-header-container">
                <p class ="modal-headline">Update -<?php echo preg_replace('/(?<!\ )[A-Z]/', ' $0', (substr($modelClass, 0, -1))); ?></p>
            </div>
            <?php print "<?php " ?>
            $form = $this->beginWidget('CActiveForm', array(
            'id' => 'update',
            'enableAjaxValidation' => false,
            'htmlOptions' => array(
            'onsubmit' => "return false;",
            ),
            ));
            ?> 
            <?php
            foreach ($columns as $column) {
                if ($column->name == 'id' || $column->name == 'created_at' || $column->name == 'updated_at' || $column->name == 'is_deleted' || $column->name == 'updated_user_id' || $column->name == 'deleted_user_id' || $column->name == 'user_id') {
                    
                } else {
                    if ($column->isPrimaryKey)
                        continue;
                    ?>
                    <div class ="col-lg-12">
                        <div class="crud-texfield">
                            <?php echo "<?php"; ?> print CHtml::activeLabelEx($model,'<?php echo $column->name ?>'); ?>
                            <span class="icomoon-icon-book-2"></span>
                            <div class="explicit-field-container">
                                <?php
                                $idChecker = substr($column->name, -3);
                                $fieldNoID = substr($column->name, 0, -3);
                                $amount = substr($column->name, -6);
                                if ($idChecker == '_id') {
                                    $words = explode('_', strtolower($fieldNoID));

                                    $modelName = '';
                                    foreach ($words as $word) {
                                        $modelName .= ucfirst(trim($word));
                                    }
                                    $modelName = $modelName . 's';
                                    ?>
                                    <?php echo "<?php"; ?> print CHtml::activeDropDownList($model,'<?php echo $column->name ?>', CHtml::listData(<?php print $modelName ?>::model_getAllData_byDeleted(Utilities::NO), 'id', 'name'), array('id' => '<?php echo str_replace('_', '-', $column->name) ?>', 'class' => 'clear-fields', 'autocomplete' => 'off', 'prompt' => 'Choose One')) ?>
                                <?php } else if ($amount == 'amount') { ?>
                                    <?php echo "<?php"; ?> print CHtml::activeTextField($model,'<?php echo $column->name ?>', array('id' => '<?php echo str_replace('_', '-', $column->name) ?>', 'class' => 'clear-fields', 'autocomplete' => 'off', 'placeholder' => '₱ 0.00', 'style' => 'text-align: right;')) ?>
                                <?php } else { ?>
                                    <?php echo "<?php"; ?> print CHtml::activeTextField($model,'<?php echo $column->name ?>', array('id' => '<?php echo str_replace('_', '-', $column->name) ?>', 'class' => 'clear-fields', 'autocomplete' => 'off', 'placeholder' => 'Please input <?php echo preg_replace('/(?<!\ )[A-Z]/', ' $0', (str_replace('_', ' ', $column->name))); ?>')) ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <?php echo "<?php"; ?> $this->endWidget() ?>
            <div class="col-xs-12 crud-footer-button margin-bottom-20">
                <?php echo "<?php"; ?> print CHtml::link('Back', '', array('onclick' => 'showHideModal("modal-ajax-update", false)', 'class' => 'btn btn-danger')); ?>
                <?php echo "<?php"; ?> print CHtml::link('Update', '', array('id' => 'update-id', 'onclick' => 'update(' . $id . ')', 'class' => 'ajax-update-submit btn btn-success')); ?>
            </div>
        </div>
    </div>
</div>
