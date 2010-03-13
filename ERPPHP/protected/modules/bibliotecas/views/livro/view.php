<?php
$this->breadcrumbs=array(
	'Livros'=>array('index'),
	$model->id_livro,
);
?>
<h1>View livro #<?php echo $model->id_livro; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List livro',array('index')); ?></li>
	<li><?php echo CHtml::link('Create livro',array('create')); ?></li>
	<li><?php echo CHtml::link('Update livro',array('update','id'=>$model->id_livro)); ?></li>
	<li><?php echo CHtml::linkButton('Delete livro',array('submit'=>array('delete','id'=>$model->id_livro),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage livro',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_livro',
		'id_biblioteca',
		'isbn',
		'exemplar',
		'titulo',
		'autor',
		'editora',
		'ano',
		'edicao',
		'local',
	),
)); ?>
