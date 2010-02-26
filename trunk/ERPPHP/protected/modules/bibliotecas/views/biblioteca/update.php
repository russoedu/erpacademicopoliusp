<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Update Biblioteca <?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Biblioteca',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Biblioteca',array('create')); ?></li>
	<li><?php echo CHtml::link('View Biblioteca',array('view','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::link('Manage Biblioteca',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>