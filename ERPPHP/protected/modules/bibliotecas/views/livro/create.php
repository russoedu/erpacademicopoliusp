<?php
$this->breadcrumbs=array(
	'Livros'=>array('index'),
	'Create',
);
?>
<h1>Create Livro</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Livro',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage Livro',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
