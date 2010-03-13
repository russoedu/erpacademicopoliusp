<?php
$this->breadcrumbs=array(
	'Bibliotecarios',
);
?>

<h1>List bibliotecario</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create bibliotecario',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage bibliotecario',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
