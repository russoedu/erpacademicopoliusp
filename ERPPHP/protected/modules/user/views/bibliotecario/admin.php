<?php
$this->breadcrumbs=array(
	'Bibliotecarios'=>array('index'),
	'Manage',
);
?>
<h1>Manage Bibliotecarios</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List bibliotecario',array('index')); ?></li>
	<li><?php echo CHtml::link('Create bibliotecario',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_bibliotecario',
		'nome',
		'tbl_users_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
