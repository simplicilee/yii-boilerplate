<?php

$this->widget('ext.YiiDateTimePicker.jqueryDateTime', array(
    'name' => $attribute,
    'model' => $model,
    'attribute' => $attribute,
    'options' => array(
        'format' => 'Y-m-d H:i:s',
    //'datepicker' => false,
    //'theme' => 'dark',
    ), //DateTimePicker options
    'htmlOptions' => array(),
));
?>