<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	$model->ID,
);
?>
<h1>View Aluno #<?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Aluno',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Aluno',array('create')); ?></li>
	<li><?php echo CHtml::link('Update Aluno',array('update','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Delete Aluno',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage Aluno',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'firstName',
		'lastName',
		'email',
	),
)); ?>
