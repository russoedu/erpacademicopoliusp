<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_curso), array('view', 'id'=>$data->id_curso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duracao')); ?>:</b>
	<?php echo CHtml::encode($data->duracao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodo')); ?>:</b>
	<?php echo CHtml::encode($data->periodo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />


</div>