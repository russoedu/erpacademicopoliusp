<?php
$this->breadcrumbs=array(
	'Professors',
);
?>

<h1>List professor</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create professor',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage professor',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
