<div class="col-lg-12">
    <div class="box gradient">
        <header>
            <span><i class="icomoon-icon-grid-3 color-light-blue"></i>Manage -<?php echo preg_replace('/(?<!\ )[A-Z]/', ' $0', ($modelClass)); ?> </span>
            <?php print "<?php"; ?> print CHtml::link('NEW', '', array('onclick' => 'renderCreate()', 'class' => 'button-right btn btn-success')) ?>
        </header>
        <?php echo "<?php"; ?> 
        $static = array('' => Yii::t('','All'));
        $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'<?php echo $this->class2id($modelClass); ?>-grid',
        'dataProvider'=>$model->search(),
        'afterAjaxUpdate'=>'reinstallDatePicker',
        'filter'=>$model,
        'columns'=>array(
            array(
                'header' => '#',
                'value' => '$this->grid->dataProvider->pagination->offset + $row+1 . ". "',
                'type' => 'raw',
                'htmlOptions' => array(
                    'style' => 'width: 50px;'
                ),
            ),
            array(
                'name' => 'created_at',
                'value' => 'CHtml::link(Settings::setDateStandard($data->created_at), Yii::app()->createUrl(""),array("onclick" => "view($data->id, ' . "'" . Settings::get_ControllerID() . "'" . '); return false; "))',
                'type' => 'raw',
                'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'created_at',
                    'htmlOptions' => array(
                        'class' => 'datepicker',
                    ),
                    ), true),
                'headerHtmlOptions' => array(
                    'style' => 'min-width: 100px;'
                ),
            ),
        <?php
        
        if (count($columns) == 8) { ?>
            array(
                'name' => 'name',
                'value' => '$data->name',
                'headerHtmlOptions' => array(
                    'style' => 'width: 80%;'
                ),
            ),
        <?php } else {
                        
            foreach ($columns as $column) {
                if ($column->name == 'id' || $column->name == 'created_at' || $column->name == 'updated_at' || $column->name == 'is_deleted'|| $column->name == 'updated_user_id' || $column->name == 'deleted_user_id' || $column->name == 'user_id') {

                } else {
                    $idChecker = substr($column->name, -3);
                    $fieldNoID = substr($column->name, 0, -3);
                    $amount = substr($column->name, -6);
                    $date = substr($column->name, 0, 4);
                    echo "\t\t\tarray(\n";
                    echo "\t\t\t\t\t'name' => '" . $column->name . "',\n";
                    if ($idChecker == '_id') {
                           $words = explode('_', strtolower($fieldNoID));

                           $modelName = '';
                           foreach ($words as $word) {
                               $modelName .= ucfirst(trim($word));
                           }

                           $relation = lcfirst($modelName) . 's';
                           $modelName = $modelName .'s';
                            
                        echo "\t\t\t\t\t'filter' => \$static + CHtml::listData($modelName::model_getAllData_byDeleted(Utilities::NO), 'id', 'name'),\n";
                        echo "\t\t\t\t\t'value' => '\$data->".$relation. "->name',\n";

                    } else if ($amount == 'amount') {
                            echo "\t\t\t\t\t'value' => 'Settings::setPesoWithNumberFormatAndStyle(\$data->".$column->name. ", 2)',\n";
                            echo "\t\t\t\t\t\t'type' => 'raw',\n";
                    } else if ($date == 'date') {
                        echo "\t\t\t\t\t'value' => 'Settings::setDateStandard(\$data->" .$column->name. ")',\n";
                        echo "\t\t\t\t\t\t'type' => 'raw',\n";
                    } else {
                        echo "\t\t\t\t\t'value' => '\$data->$column->name',\n";
                    }
                    echo "\t\t\t\t\t'headerHtmlOptions' => array(\n";
                    echo "\t\t\t\t\t\t'style' => 'min-width: 120px;'\n";
                    echo "\t\t\t\t\t),\n";
                    echo "\t\t\t\t),\n";
                }
            }
                        
        }
        ?>
        array(
            'class' => 'CButtonColumn',
            'header' => 'Actions',
            'template' => '{Update}{Delete}',
            'buttons' => array(
                'Update' => array(
                    'label' => '<span class="icomoon-icon-pencil-2 grid-view-icon-button"></span>',
                    'url' => '$data->id',
                    'options' => array(
                        'title' => '', 'data-tooltip' => 'Update',
                    ),
                    'click' => 'function() { renderUpdate($(this).attr("href")); return false; }',
                ),
                'Delete' => array(
                    'label' => '<span class="icomoon-icon-remove-4 color-red grid-view-icon-button"></span>',
                    'url' => '$data->id',
                    'options' => array(
                        'title' => '', 'data-tooltip' => 'Delete',
                    ),
                    'click' => 'function() { ajaxDelete($(this).attr("href"), ' . '"' . Settings::get_ControllerID() . '"' . '); return false; }',
                ),
            ),
            'headerHtmlOptions' => array(
                'style' => 'min-width: 50px;'
            ),
        ),
        ),
        )); 
        ?>
    </div>
</div>


<div id="my-modal-container"></div>
<div id ="html"></div>
<?php echo "<?php"; ?> print $this->renderPartial('_js'); ?>