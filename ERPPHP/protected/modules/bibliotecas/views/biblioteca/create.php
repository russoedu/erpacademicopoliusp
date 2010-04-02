<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	'Criar',
);
?>
<h1>Criar Biblioteca</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>