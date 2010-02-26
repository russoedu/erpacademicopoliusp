<?php
$this->breadcrumbs=array(
	'Turmas'=>array('index'),
	$model->ID,
);
?>
<h1>View Turma #<?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Turma',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Turma',array('create')); ?></li>
	<li><?php echo CHtml::link('Update Turma',array('update','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Delete Turma',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage Turma',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'nome',
		'disciplina_id',
	),
)); ?>
