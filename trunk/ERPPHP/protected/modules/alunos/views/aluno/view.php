<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	$model->id_aluno,
);
?>
<h1>View aluno #<?php echo $model->id_aluno; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List aluno',array('index')); ?></li>
	<li><?php echo CHtml::link('Create aluno',array('create')); ?></li>
	<li><?php echo CHtml::link('Update aluno',array('update','id'=>$model->id_aluno)); ?></li>
	<li><?php echo CHtml::linkButton('Delete aluno',array('submit'=>array('delete','id'=>$model->id_aluno),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage aluno',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_aluno',
		'nome',
		'rg',
		'cpf',
		'endereco',
		'telefone',
		'celular',
		'email',
		'tbl_users_id',
	),
)); ?>
