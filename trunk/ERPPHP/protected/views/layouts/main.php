<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
            </div><!-- header -->

            <div id="mainmenu">

                <?php
                //chave , nome do grupo , valor menus para o grupo....
                $menu = array(
                        //menus para guest...
                        'guest'=>array(
                                array('label'=>'Contato', 'url'=>array('/site/contact')),
                                array('label'=>'Alunos', 'url'=>array('/alunos/aluno')),
                                array('label'=>'Cursos', 'url'=>array('/cursos/curso')),
                                array('label'=>'Disciplinas', 'url'=>array('/cursos/disciplina')),
                                array('label'=>'Bibliotecas','url'=>array('/bibliotecas/biblioteca')),
                                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
                                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>'Registro', 'visible'=>Yii::app()->user->isGuest),
                                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest)
                        ),
                        'aluno'=>array(
                                array('label'=>'Cursos', 'url'=>array('/cursos/curso')),
                                array('label'=>'Disciplinas', 'url'=>array('/cursos/disciplina')),
                                array('label'=>'Bibliotecas','url'=>array('/bibliotecas/biblioteca')),
                                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>'Perfil'),
                                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')')
                        ),
                        'bibliotecario'=>array(
                                array('label'=>'Bibliotecas','url'=>array('/bibliotecas/biblioteca')),
                                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>'Perfil'),
                                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')')
                        ),
                        'admin'=>array(
                                array('label'=>'Alunos', 'url'=>array('/alunos/aluno')),
                                array('label'=>'Cursos', 'url'=>array('/cursos/curso')),
                                array('label'=>'Usuários', 'url'=>array('/user/admin')),
                                array('label'=>'Disciplinas', 'url'=>array('/cursos/disciplina')),
                                array('label'=>'Oferecimentos', 'url'=>array('/cursos/oferecimento')),
                                array('label'=>'Bibliotecas','url'=>array('/bibliotecas/biblioteca')),
                                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>'Perfil'),
                                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')')
                        ),
                        'professor'=>array(
                                array('label'=>'Alunos', 'url'=>array('/alunos/aluno')),
                                array('label'=>'Cursos', 'url'=>array('/cursos/curso')),
                                array('label'=>'Disciplinas', 'url'=>array('/cursos/disciplina')),
                                array('label'=>'Bibliotecas','url'=>array('/bibliotecas/biblioteca')),
                                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>'Perfil'),
                                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')')
                        ),
                        'gestoracademico'=>array(
                                array('label'=>'Cursos', 'url'=>array('/cursos/curso')),
                                array('label'=>'Disciplinas', 'url'=>array('/cursos/disciplina')),
                                array('label'=>'Oferecimentos', 'url'=>array('/cursos/oferecimento')),
                                array('label'=>'Alunos', 'url'=>array('/alunos/aluno')),
                                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>'Perfil'),
                                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')')
                        ),
                );
                $grupo = Yii::app()->getModule('user')->getGrupo();
                $this->widget('zii.widgets.CMenu',array(
                        //widget do menu de fato meu value!...
                        'items'=>$menu[$grupo]

                )); ?>
            </div><!-- mainmenu -->

            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->

            <div id="content">
                <?php echo $content; ?>
            </div><!-- content -->

            <div id="footer">
		Copyright &copy; <?php echo 2010; ?> Coop10 - PCS2044- Turma 2.<br/>
		Some Rights Reserved - MIT License.<br/>
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>