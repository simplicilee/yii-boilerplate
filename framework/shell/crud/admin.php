<?php
/**
 * This is the template for generating the admin view for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $modelClass: the model class name
 * - $columns: a list of column schema objects
 */
?>
<?php echo "<?php"; ?> 
Yii::app()->clientScript->registerScript("javascript","

	$('select').select2({ width: 'resolve' });
	$('.select2-hidden-accessible').attr('hidden', true);
	$( 'input' ).addClass('form-control' );

	function reinstallDatePicker(id, data) {
		//use the same parameters that you had set in your widget else the datepicker will be refreshed by default
		$('.datePicker').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['ja'],{'dateFormat':'yy-mm-dd'}));

		$( 'input' ).addClass('form-control' );
		$('select').select2({ width: 'resolve' });
		$('.select2-hidden-accessible').attr('hidden', true);
	}
",2);
?>

<div class="col-lg-12">
    <div class="metronicManage">
        <header>
            <span><i class="fa fa-th"></i>Manage - <?php echo $modelClass; ?></span>
            <?php echo "<?php"; ?> print CHtml::link('<i class="brocco-icon-plus"></i>',$this->createUrl('<?php echo $modelClass; ?>/create'), array('class' => 'btn-back', 'data-tooltip' => 'Create')); ?>
        </header>
        <?php echo "<?php"; ?> $static = array('' => Yii::t('','All'));?>
        <?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'<?php echo $this->class2id($modelClass); ?>-grid',
        'dataProvider'=>$model->search(),
        'afterAjaxUpdate'=>'reinstallDatePicker',
        'filter'=>$model,
        'columns'=>array(
        array(
        'header'=> 'Date Created',
        'name'=>'created_at',
        'value'=>'Settings::setDateStandard($data->created_at)',
        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', 
        array(
        'model' => $model,
        'attribute' => 'created_at',
        'htmlOptions' => array(
        'class' => 'datePicker',
        ),
        'options' => array(
        'showOn' => 'focus', 
        'dateFormat' => 'yy-mm-dd',
        'showOtherMonths' => true,
        'selectOtherMonths' => true,
        'changeMonth' => true,
        'changeYear' => true,
        'showButtonPanel' => true,
        )
        ),
        true),
        'headerHtmlOptions' => array(
        'style' => 'width: 10%;'
        ),
        ),

        <?php
        foreach ($columns as $column) {
            if ($column->name == 'id' || $column->name == 'created_at' || $column->name == 'updated_at' || $column->name == 'is_deleted') {
                
            } else {
                echo "\t\t\n";
                echo "\t\t\t\t\t\t\tarray(\n";
                echo "\t\t\t\t\t\t\t	'name' => '" . $column->name . "',\n";
                echo "\t\t\t\t\t\t\t	'value' => '\$data->$column->name',\n";
                echo "\t\t\t\t\t\t\t	'headerHtmlOptions' => array(\n";
                echo "\t\t\t\t\t\t\t		'style' => 'width: 10%;'\n";
                echo "\t\t\t\t\t\t\t	),\n";
                echo "\t\t\t\t\t\t\t),\n";
            }
        }
        ?>

        array(
        'class'                => 'CButtonColumn',
        'header'               => 'Action',
        'template'             => '{view}{update}{delete}', 
        'viewButtonLabel'      => '<span class="minia-icon-search"></span>', 
        'viewButtonOptions'    => ['title' => '', 'data-tooltip' => 'View',], 
        'viewButtonImageUrl'   => false, 
        'updateButtonLabel'    => '<span class="icomoon-icon-pencil-2"></span>', 
        'updateButtonOptions'  => ['title' => '', 'data-tooltip' => 'Update',], 
        'updateButtonImageUrl' => false,
        'deleteButtonLabel'    => '<span style="color:red;" class="icomoon-icon-remove"></span>',
        'deleteButtonOptions'  => ['title' => '', 'data-tooltip' => 'Delete',],
        'deleteButtonImageUrl' => false,
        'deleteConfirmation'   => 'Are you sure you want to delete?', 
        'htmlOptions' => array(
        'style' => 'width: 10%;'
        ),
        ),
        ),
        )); ?>
    </div>
</div>
