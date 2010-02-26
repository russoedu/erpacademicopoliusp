<?php
$this->breadcrumbs=array(
	'Turmas'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Update Turma <?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Turma',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Turma',array('create')); ?></li>
	<li><?php echo CHtml::link('View Turma',array('view','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::link('Manage Turma',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>