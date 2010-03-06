<?php
$this->breadcrumbs=array(
	'Cursos',
);
?>

<h1>List curso</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create curso',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage curso',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
