<?php
$this->breadcrumbs=array(
        'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
        $biblioteca->nome=>array('/bibliotecas/biblioteca/view','id'=>$biblioteca->id_biblioteca),
        $livro->titulo=>array('/bibliotecas/livro/view','id'=>$livro->id_livro),
	'Atualização de Empréstimo',
);
?>

<h1>Atualização de Empréstimo</h1>

<?php echo $this->renderPartial('_formRenovacao', array('model'=>$model, 'aluno'=>$aluno, 'livro'=>$livro, 'status'=>$status)); ?>