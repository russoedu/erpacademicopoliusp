<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_biblioteca')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_biblioteca), array('view', 'id'=>$data->id_biblioteca)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('local')); ?>:</b>
	<?php echo CHtml::encode($data->local); ?>
	<br />


</div>