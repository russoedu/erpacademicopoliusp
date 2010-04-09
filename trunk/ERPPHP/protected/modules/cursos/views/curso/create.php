<?php
$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Criar',
);
?>
<h1>Criar curso</h1>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
