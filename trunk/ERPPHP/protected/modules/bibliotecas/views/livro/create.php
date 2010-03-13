<?php
$this->breadcrumbs=array(
	'Livros'=>array('index'),
	'Create',
);
?>
<h1>Create livro</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List livro',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage livro',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>