<?php
$this->breadcrumbs=array(
	'Bibliotecas',
);
?>

<h1>List Biblioteca</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create Biblioteca',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage Biblioteca',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
