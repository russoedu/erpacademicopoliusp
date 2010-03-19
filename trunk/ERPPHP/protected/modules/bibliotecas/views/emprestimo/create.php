<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
        $biblioteca->nome=>array('/bibliotecas/biblioteca/view','id'=>$biblioteca->id_biblioteca),
        $livro->titulo=>array('/bibliotecas/livro/view','id'=>$livro->id_livro),
	'Novo Empréstimo',
);
?>
<h1>Novo Empréstimo</h1>

<ul class="actions">
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model,'livro'=>$livro)); ?>