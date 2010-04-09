<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('/user/admin'),
	$model->username,
);
?>
<h1><?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Lista de usuários'),array('admin')),
			CHtml::link(UserModule::t('Criar'),array('/user/user/novoUsuario')),
			CHtml::link(UserModule::t('Atualizar Usuário'),array('update','id'=>$model->id)),
			CHtml::linkButton(UserModule::t('Deletar Usuário'),array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Tem certeza?'))),
		),
	));     


	$attributes = array(
		'id',
		'username',
	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'value' => $model->profile->getAttribute($field->varname),
				));
		}
	}
	
	array_push($attributes,
		'email',
		array(
			'name' => 'createtime',
			'value' => date("d.m.Y H:i:s",$model->createtime),
		),
		array(
			'name' => 'lastvisit',
			'value' => date("d.m.Y H:i:s",$model->lastvisit),
		)
	);
	
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));
	

?>
