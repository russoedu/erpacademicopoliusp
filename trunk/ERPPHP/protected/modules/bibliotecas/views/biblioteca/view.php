<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	$model->nome,
);
?>
<h1>Biblioteca - <?php echo $model->nome; ?></h1>

<ul class="actions">
	<li><?php# echo CHtml::link('List Biblioteca',array('index')); ?></li>
	<li><?php# echo CHtml::link('Create Biblioteca',array('create')); ?></li>
	<li><?php echo CHtml::link('Editar Biblioteca',array('update','id'=>$model->ID)); ?></li>
        <li><?php echo CHtml::link('Adicionar livro',array('/bibliotecas/livro/create','bib_id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Delete Biblioteca',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php# echo CHtml::link('Manage Biblioteca',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		#'ID',
		'nome',
		'local',
		'bibliotecario',
		'outros',
	),
)); ?>

<?php $this->widget('zii.widgets.CListView' , array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_viewLivro',
));

?>

