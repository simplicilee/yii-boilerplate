<?php

$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => $name,
    //'model' => $model,
    //'attribute' => $attribute,
    'language' => 'en-AU',
    // additional javascript options for the date picker plugin
    'options' => array(
        'showAnim' => 'slide',
        //'showButtonPanel'=>true,
        //'showOn'    => 'button',
        //'buttonImage' => Settings::get_baseUrl() . '/images/calendar.gif',
        'buttonImageOnly' => false,
        'changeMonth' => true,
        'changeYear' => true,
        //'defaultDate' => '1y',
        'dateFormat' => 'yy-mm-dd',
        'yearRange' => '1950:2099',
    /*
      'onSelect'=> 'js:function( selectedDate ) {
      alert(selectedDate);
      //$("#'.CHtml::activeId($model,'birthdate').'").datepicker( "option", "minDate", selectedDate );
      $("#birhthdate").val(selectedDate);
      }',
     * 
     */
    ),
    'htmlOptions' => array(
        //'style'=>'height:20px;',
        'disabled' => false,
    )
));
?>    