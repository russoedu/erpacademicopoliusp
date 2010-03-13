<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	'Manage',
);
?>
<h1>Manage Alunos</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List aluno',array('index')); ?></li>
	<li><?php echo CHtml::link('Create aluno',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_aluno',
		'nome',
		'rg',
		'cpf',
		'endereco',
		'telefone',
		/*
		'celular',
		'email',
		'tbl_users_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
