<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	'Manage',
);
?>
<h1>Manage Alunos</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Aluno',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Aluno',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'ID',
		'firstName',
		'lastName',
		'email',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
