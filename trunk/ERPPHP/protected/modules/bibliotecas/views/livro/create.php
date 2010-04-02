<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
    $biblioteca->nome=>array('/bibliotecas/biblioteca/view' , 'id'=>$biblioteca->id_biblioteca),
	'Adicionar Livro',
);
?>
<h1>Novo Livro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>