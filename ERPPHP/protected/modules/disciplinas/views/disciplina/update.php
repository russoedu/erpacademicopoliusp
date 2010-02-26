<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Update Disciplina <?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Disciplina',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Disciplina',array('create')); ?></li>
	<li><?php echo CHtml::link('View Disciplina',array('view','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::link('Manage Disciplina',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>