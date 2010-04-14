<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_horario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_horario), array('view', 'id'=>$data->id_horario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_oferecimento')); ?>:</b>
	<?php echo CHtml::encode($data->id_oferecimento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dia')); ?>:</b>
	<?php echo CHtml::encode($data->dia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horario_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->horario_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horario_fim')); ?>:</b>
	<?php echo CHtml::encode($data->horario_fim); ?>
	<br />


</div>