<?php
$this->breadcrumbs=array(
	'Livros'=>array('index'),
	$model->id_livro=>array('view','id'=>$model->id_livro),
	'Update',
);
?>

<h1>Update livro <?php echo $model->id_livro; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List livro',array('index')); ?></li>
	<li><?php echo CHtml::link('Create livro',array('create')); ?></li>
	<li><?php echo CHtml::link('View livro',array('view','id'=>$model->id_livro)); ?></li>
	<li><?php echo CHtml::link('Manage livro',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>