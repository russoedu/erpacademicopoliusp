<?php
$this->breadcrumbs=array(
	'Professors'=>array('index'),
	'Manage',
);
?>
<h1>Manage Professors</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List professor',array('index')); ?></li>
	<li><?php echo CHtml::link('Create professor',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_professor',
		'nome',
		'tbl_users_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
