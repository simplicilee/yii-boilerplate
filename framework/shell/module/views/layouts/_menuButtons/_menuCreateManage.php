<?php
echo CHtml::button('Create', array(
    'submit' => array($controller . '/create'),
    'class' => 'btn btn-sm btn-danger'
));
?>
&nbsp;&nbsp;
<?php
echo CHtml::button('Manage', array(
    'submit' => array($controller . '/admin'),
    'class' => 'btn btn-sm btn-danger'
));
?>
