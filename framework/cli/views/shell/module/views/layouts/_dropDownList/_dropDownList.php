<?php

//$lawyerName = Employees::sql_getFullName($model->emp_id);
Yii::app()->clientScript->registerScript("javascript", "
    
    $('select').select2({ width: 'resolve' });
    $('.select2-hidden-accessible').attr('hidden', true);
    $( 'input' ).addClass('form-control' );

", 2);
?>
<?php print CHtml::activeDropDownList($model, $attribute, CHtml::listData($model, 'id', 'name')); ?>