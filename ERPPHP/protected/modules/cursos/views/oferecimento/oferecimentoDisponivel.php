<?php
$this->breadcrumbs=array(
	'Oferecimentos'=>array('index'),
        'Oferecimentos Disponíveis'
);
?>

<h1>Oferecimentos Disponíveis</h1>

<ul class="actions">
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewOferecimentoDisponivel',
        'viewData'=>array('aluno'=>$aluno,),
)); ?>