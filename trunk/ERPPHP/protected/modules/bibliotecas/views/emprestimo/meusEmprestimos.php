<?php
$this->breadcrumbs=array(
        'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
	'Meus Emprestimos',
);
?>

<h1>Meus Empréstimos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewMeusEmprestimos',
)); ?>
