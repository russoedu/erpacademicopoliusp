<?php
$this->breadcrumbs=array(
	'Livros',
);
?>

<h1>List Livro</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create Livro',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage Livro',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
