<?php
/**
 * This is the template for generating a model class file.
 * The following variables are available in this template:
 * - $className: the class name
 * - $tableName: the table name
 * - $columns: a list of table column schema objects
 * - $rules: a list of validation rules (string)
 * - $labels: a list of labels (column name => label)
 * - $relations: a  list of relations (string)
 */
?>
<?php echo "<?php\n"; ?>

/**
 * This is the model class for table "<?php echo $tableName; ?>".
 *
 * The followings are the available columns in table '<?php echo $tableName; ?>':
<?php foreach ($columns as $column): ?>
 * @property <?php echo $column->type . ' $' . $column->name . "\n"; ?>
<?php endforeach; ?>
*/
class <?php echo $className; ?> extends CActiveRecord {

    public function tableName()
    {
        return '<?php echo $tableName; ?>';
    }

    public static function tbl()
    {
        return '<?php echo $tableName; ?>';
    }	

    public function beforeSave() 
    {
        if ($this->isNewRecord) {
            $this->created_at = Settings::get_DateTime();
            $this->updated_at = Settings::get_DateTime();
            $this->user_id = Settings::get_UserID();
            $this->updated_user_id = Settings::get_UserID();
            $this->deleted_user_id = Utilities::NO;
            $this->is_deleted = Utilities::NO;
        } else {
            $this->updated_at = Settings::get_DateTime();
            $this->updated_user_id = Settings::get_UserID();
        }
        
        if ($this->is_deleted == Utilities::YES) {
            $this->deleted_user_id = Settings::get_UserID();
        }

        return parent::beforeSave();
    }

    public function rules()
    {
        return array(
    <?php foreach ($rules as $rule): ?>
        <?php echo $rule . ",\n"; ?>
    <?php endforeach; ?>
        array('<?php echo implode(', ', array_keys($columns)); ?>', 'safe', 'on' => 'search'),
        );
    }

    public function relations()
    {
        return array(
            'users' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'updatedUsers' => array(self::BELONGS_TO, 'Users', 'updated_user_id'),
            'deletedUsers' => array(self::BELONGS_TO, 'Users', 'deleted_user_id'),
            <?php 
                foreach ($columns as $column) : ?> 
                    <?php
                    $idChecker = substr($column->name, -3);
                    $fieldNoID = substr($column->name, 0, -3);
                    if ($column->name != 'user_id' && $column->name != 'updated_user_id' && $column->name != 'deleted_user_id' && $column->name != 'local_id') { 
                        if ($idChecker == '_id') {
                            $words = explode('_', strtolower($fieldNoID));

                            $modelName = '';
                            foreach ($words as $word) {
                                $modelName .= ucfirst(trim($word));
                            }

                            $relation = lcfirst($modelName) . 's';
                            $modelName = $modelName .'s';

                        echo "'$relation' => array(self::BELONGS_TO, '$modelName', '$column->name'),";

                        }
                    
                    }
                
            ?>
            <?php endforeach; ?>
        );
    }
    
    <?php 
    foreach ($columns as $column) {

        $idChecker = substr($column->name, -3);
        $fieldNoID = substr($column->name, 0, -3);
        $amount = substr($column->name, -6);
        $date = substr($column->name, -4);
        if ($column->name != 'user_id' && $column->name != 'updated_user_id' && $column->name != 'deleted_user_id') {
            if ($idChecker == '_id') { 
                $words = explode('_', strtolower($fieldNoID));

                $modelName = '';
                foreach ($words as $word) {
                    $modelName .= ucfirst(trim($word));
                }
                $modelName = lcfirst($modelName) .'s';
                print '//$model->' . $column->name . '= $model->' . $modelName . '->name;' . "\n";
            } else if ($amount == 'amount') {
                print '//$model->' . $column->name . '= Settings::setPesoWithNumberFormat($model->' . $column->name .', 2);' . "\n";
            } else if ($date == 'date') {
                print '//$model->' . $column->name . '= Settings::setDateStandard($model->' . $column->name . ');' . "\n";
            }
        }
        
    }
    
    ?>


    public function attributeLabels()
    {
        return array(
        <?php foreach ($labels as $column => $label): ?>
    <?php 
    if ($column == 'created_at') {
    echo "'$column' => 'Date Created',\n";
    } else if ($column == 'updated_at') {
    echo "'$column' => 'Last Modified',\n";
    } else if ($column == 'user_id') {
    echo "'$column' => 'Created By',\n";
    } else if ($column == 'updated_user_id') {
    echo "'$column' => 'Last Updated By',\n";
    } else if ($column == 'is_deleted') {
    echo "'$column' => 'Deleted',\n";
    } else {
    echo "'$column' => '$label',\n";
    }
    ?>
    <?php endforeach; ?>
    );
    
    }

    public function search()
    {
        $criteria = new CDbCriteria;

    <?php
    foreach ($columns as $name => $column) {
        if ($column->type === 'string') {
            echo "\t\$criteria->compare('$name', \$this->$name, true);\n\n";
        } else {
            echo "\t\$criteria->compare('$name', \$this->$name);\n\n";
        }
    }
    ?>
        return new CActiveDataProvider('<?php echo $className; ?>', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Utilities::PAGE_SIZE,
            ),
            'sort' => array(
                'defaultOrder' => 'updated_at DESC',
            ),
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function model_getAllData_byDeleted($isDeleted)
    {
        return self::model()->findAll('is_deleted = :isDeleted', array(':isDeleted' => $isDeleted));
    }
    
}