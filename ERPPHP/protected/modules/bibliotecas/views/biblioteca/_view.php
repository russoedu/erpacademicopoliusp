<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->nome), array('view', 'id'=>$data->ID)); ?>
	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('local')); ?>:</b>
	<?php echo CHtml::encode($data->local); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bibliotecario')); ?>:</b>
	<?php echo CHtml::encode($data->bibliotecario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('outros')); ?>:</b>
	<?php echo CHtml::encode($data->outros); ?>
	<br />


</div>