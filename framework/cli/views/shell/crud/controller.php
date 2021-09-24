<?php
/**
 * This is the template for generating the controller class file for crud.
 * The following variables are available in this template:
 * - $ID: the primary key name
 * - $controllerClass: the controller class name
 * - $modelClass: the model class name
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $controllerClass; ?> extends SiteAdminController {
	
    private $_model;

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array(
                    'create',
                    'view',
                    'update',
                    'delete',
                    'renderUpdate',
                    'renderCreate',
                    'manage',
                ),
                'users' => array('@'),
            ),
            array('deny', 
                'users' => array('*'),
            ),
        );
    }
    
    
    public function actionRenderCreate()
    {

        $isRoleExist = Utilities::checkRoleAccessInAjax();
        if ($isRoleExist == '') {

            $return['isError'] = Utilities::YES;
            $return['message'] = 'You dont have access to this action !';
            $return['html'] = '';
        } else {

            $model = new <?php echo $modelClass ?>();

            $return['isError'] = Utilities::NO;
            $return['message'] = 'No Errors !';
            $return['html'] = $this->renderPartial('../' . Settings::get_ControllerID() . '/_create', ['model' => $model], true);
        }

        print json_encode($return);
    }

    public function actionCreate()
    {

        $model = new <?php echo $modelClass; ?>();

        if (isset($_POST['<?php echo $modelClass; ?>'])) {
            $model->attributes = $_POST['<?php echo $modelClass; ?>'];

            if ($model->validate()) {
                $model->save();

                $isError = Utilities::NO;
                $message = 'Successfully Created !';
           } else {

                $isError = Utilities::YES;
                $message = Utilities::get_ModelErrors($model->errors);
            }
        }
        
        print json_encode(array('isError' => $isError, 'message' => $message));
    }

    public function actionRenderUpdate()
    {
        $isRoleExist = Utilities::checkRoleAccessInAjax();
        if ($isRoleExist == '') {

            $return['isError'] = Utilities::YES;
            $return['message'] = 'You dont have access to this action !';
            $return['html'] = '';
        } else {

            $id = $_GET['id'];
            $model = Utilities::model_getByID(<?php echo $modelClass; ?>::model(), $id);

            $return['isError'] = Utilities::NO;
            $return['message'] = 'No Errors !';
            $return['html'] = $this->renderPartial('../' . Settings::get_ControllerID() . '/_update', ['model' => $model, 'id' => $id], true);
        }

        print json_encode($return);
    }

    public function actionUpdate()
    {
        $id = $_GET['id'];
        
        $model = Utilities::model_getByID(<?php echo $modelClass; ?>::model(), $id);
        $model->attributes = $_POST['<?php echo $modelClass; ?>'];

        if ($model->validate()) {
            $model->save();

            $isError = Utilities::NO;
            $message = 'Successfully Updated !';
        } else {

            $isError = Utilities::YES;
            $message = Utilities::get_ModelErrors($model->errors);
        }
 
       print json_encode(array('isError' => $isError, 'message' => $message));
    }

    public function actionView()
    {
        
        $isRoleExist = Utilities::checkRoleAccessInAjax();
        
        if ($isRoleExist == '') {

            $return['isError'] = Utilities::YES;
            $return['message'] = 'You dont have access to this action !';
            $return['html'] = '';
        } else {

            $id = $_GET['id'];
            $model = Utilities::model_getByID(<?php echo $modelClass; ?>::model(), $id);
            $model->created_at = Settings::setDateTimeStandard($model->created_at);
            $model->updated_at = Settings::setDateTimeStandard($model->updated_at);
            $model->user_id = $model->users->name;
            $model->updated_user_id = $model->updatedUsers->name;

            $return['isError'] = Utilities::NO;
            $return['message'] = 'No Errors !';
            $return['html'] = $this->renderPartial('../' . Settings::get_ControllerID() . '/_view', ['model' => $model, 'id' => $id], true);
        }

        print json_encode($return);
    }
    
    public function actionDelete()
    {

        $isRoleExist = Utilities::checkRoleAccessInAjax();

        if ($isRoleExist == '') {
            $isError = Utilities::YES;
            $message = 'You dont have access to this action !';
        } else {

            if (Yii::app()->request->isPostRequest) {

            $id = $_GET['id'];
            $model = Utilities::model_getByID(<?php echo $modelClass ?>::model(), $id);
            $model->deleted_user_id = Settings::get_UserID();
            $model->is_deleted = Utilities::YES;
            $model->save();

            $isError = Utilities::NO;
            $message = 'Successfully Deleted !';
            
            } else {
                $isError = Utilities::YES;
                $message = 'What are you looking for ?';
            }
        }

        print json_encode(array('isError' => $isError, 'message' => $message));
    }

    public function actionManage()
    {

        Utilities::checkRoleAccess();

        $model = new <?php echo $modelClass; ?>('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['<?php echo $modelClass; ?>'])) {
            $model->attributes = $_GET['<?php echo $modelClass; ?>'];
        }
        $model->is_deleted = Utilities::NO;

        $this->render('manage', array(
            'model' => $model,
        ));
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax']==='<?php echo $this->class2id($modelClass); ?>-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
