<?php
/**
 * This is the template for generating the 'view' view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>

<input class="modal-state" id="modal-ajax-view" type="checkbox" />
<div class="modal">
    <label class="modal-background" for="modal-ajax-view"></label>
    <div class="modal-inner-xs">
        <?php echo "<?php " ?> print CHtml::link('<span class ="minia-icon-close modal-close-button"></span>', '', array('onclick' => 'showHideModal("modal-ajax-view", false)' )) ?>
        <div class="modal-crud-container">
            <div class ="modal-header-container">
                <p class ="modal-headline">View -<?php echo preg_replace('/(?<!\ )[A-Z]/', ' $0', (substr($modelClass, 0, -1))); ?></p>
            </div>
            <div class="row modal-ul">
                <ul class="col-lg-12 unstyled">
                    <?php foreach ($columns as $column)
                    if ($column->name == 'is_deleted' || $column->name == 'id' || $column->name == 'deleted_user_id') {
                    } else {
                        echo '<li>
                            <span class="icon12 typ-icon-arrow-right"></span>
                            <?php print CHtml::activeLabel($model, ' . "'" . $column->name . "'" . '); ?>
                            : <strong id = "view-' . str_replace('_','-', $column->name) . '"><?php print $model->' . $column->name . ' ?></strong>
                        </li>
                        ';
                    } ?> 
                </ul>
            </div>
        </div>
    </div>
</div>