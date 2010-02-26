<?php
$this->breadcrumbs=array(
	'Livros'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Update Livro <?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Livro',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Livro',array('create')); ?></li>
	<li><?php echo CHtml::link('View Livro',array('view','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::link('Manage Livro',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>