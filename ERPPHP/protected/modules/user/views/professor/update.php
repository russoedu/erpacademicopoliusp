<?php
$this->breadcrumbs=array(
	'Professors'=>array('index'),
	$model->id_professor=>array('view','id'=>$model->id_professor),
	'Update',
);
?>

<h1>Update professor <?php echo $model->id_professor; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List professor',array('index')); ?></li>
	<li><?php echo CHtml::link('Create professor',array('create')); ?></li>
	<li><?php echo CHtml::link('View professor',array('view','id'=>$model->id_professor)); ?></li>
	<li><?php echo CHtml::link('Manage professor',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>