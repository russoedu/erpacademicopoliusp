<?php
$this->breadcrumbs=array(
	'Turmas'=>array('index'),
	'Manage',
);
?>
<h1>Manage Turmas</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Turma',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Turma',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'ID',
		'nome',
		'disciplina_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
