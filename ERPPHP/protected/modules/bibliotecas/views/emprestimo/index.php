<?php
$this->breadcrumbs=array(
	'Emprestimos',
);
?>

<h1>Empréstimos</h1>

<ul class="actions">
	
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=> array(
            'nome_aluno'=>$aluno->nome,
        )
)); ?>
