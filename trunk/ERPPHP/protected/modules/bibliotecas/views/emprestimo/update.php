<?php
$this->breadcrumbs=array(
        'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
        $biblioteca->nome=>array('/bibliotecas/biblioteca/view','id'=>$biblioteca->id_biblioteca),
        $livro->titulo=>array('/bibliotecas/livro/view','id'=>$livro->id_livro),
	'Renovação de Empréstimo',
);
?>

<h1>Renovação de Empréstimo</h1>

<ul class="actions">
</ul><!-- actions -->

<?php echo $this->renderPartial('_formRenovacao', array('model'=>$model, 'aluno'=>$aluno, 'livro'=>$livro)); ?>