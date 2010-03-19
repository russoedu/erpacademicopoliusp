<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	$model->nome=>array('view','id'=>$model->id_biblioteca),
	'Atualizar'
);
?>

<h1>Biblioteca <?php echo $model->nome; ?></h1>

<ul class="actions">
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>