<?php
$this->breadcrumbs=array(
	'Oferecimentos'=>array('index'),
        'Meus Oferecimentos'
);
?>

<h1>Meus Oferecimentos</h1>

<ul class="actions">
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewMeusOferecimentos',
        'viewData'=>array('aluno'=>$aluno,),
)); ?>