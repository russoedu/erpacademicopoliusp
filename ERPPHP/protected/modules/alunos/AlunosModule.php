<?php

class AlunosModule extends CWebModule {
    public $hash='md5';
    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
                'alunos.models.*',
                'alunos.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if(parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

    public function encrypting($string="") {
        $hash = Yii::app()->controller->module->hash;
        if ($hash=="md5")
            return md5($string);
        if ($hash=="sha1")
            return sha1($string);
        else
            return hash($hash,$string);
    }
}
