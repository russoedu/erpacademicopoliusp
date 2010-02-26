<?php
$this->breadcrumbs=array(
	'Livros'=>array('index'),
	'Manage',
);
?>
<h1>Manage Livros</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Livro',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Livro',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'ID',
		'nome',
		'autor',
		'ISDN',
		'numClassfica',
		'editor',
		/*
		'ano',
		'local',
		'biblioteca_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
