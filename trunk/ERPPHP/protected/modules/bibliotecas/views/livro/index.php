<?php
$this->breadcrumbs=array(
	'Livros',
);
?>

<h1>List livro</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create livro',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage livro',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
