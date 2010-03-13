<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'ERP - Modulo Educacional',
        //Módulos "instalados"
        'modules'=>array(
                'alunos' ,
                'disciplinas',
                'bibliotecas',
                'cursos',
                'user'=>array(
                        'hash' => 'md5',                                     # encrypting method (php hash function)
                        'sendActivationMail' => false,                        # send activation email
                        'loginNotActiv' => true,                            # allow access for non-activated users
                        'autoLogin' => true,                                 # automatically login from registration
                        'registrationUrl' => array('/user/registration'),    # registration path
                        #'recoveryUrl' => array('/user/recovery'),            # recovery password path
                        'loginUrl' => array('/user/login'),                  # login form path
                        'returnUrl' => array('/user/profile'),               # page after login
                        'returnLogoutUrl' => array('/user/login'),           # page after logout
                ),),
        // preloading 'log' component
        'preload'=>array('log'),

        // autoloading model and component classes
        'import'=>array(
                'application.models.*',
                'application.components.*',
        ),

        // application components
        'components'=>array(
                'user'=>array(
                // enable cookie-based authentication
                        'allowAutoLogin'=>true,
                        'loginUrl' => array('/user/login'),
                ),
//
//		'db'=>array(
//			'connectionString' => 'sqlite:protected/data/testdrive.db',
//		),
                // uncomment the following to use a MySQL database

                'db'=>array(
                        'class'=>'CDbConnection',
                        'connectionString' => 'mysql:host=localhost;dbname=erp',
                        //'emulatePrepare' => true,
                        'username' => 'erp',
                        'password' => 'erp',
                    'tablePrefix' => '',
                //'charset' => 'utf8',
                ),

                'errorHandler'=>array(
                // use 'site/error' action to display errors
                        'errorAction'=>'site/error',
                ),
                'log'=>array(
                        'class'=>'CLogRouter',
                        'routes'=>array(
                                array(
                                        'class'=>'CFileLogRoute',
                                        'levels'=>'error, warning',
                                ),
                        // uncomment the following to show log messages on web pages
                        /*
				array(
					'class'=>'CWebLogRoute',
				),
                        */
                        ),
                ),
        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>array(
        // this is used in contact page
                'adminEmail'=>'webmaster@example.com',
        ),
);
