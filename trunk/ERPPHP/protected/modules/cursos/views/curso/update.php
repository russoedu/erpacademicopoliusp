<?php
$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Update curso <?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List curso',array('index')); ?></li>
	<li><?php echo CHtml::link('Create curso',array('create')); ?></li>
	<li><?php echo CHtml::link('View curso',array('view','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::link('Manage curso',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>