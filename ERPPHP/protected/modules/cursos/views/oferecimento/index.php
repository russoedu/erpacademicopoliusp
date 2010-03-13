<?php
$this->breadcrumbs=array(
	'Oferecimentos',
);
?>

<h1>List oferecimento</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create oferecimento',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage oferecimento',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
