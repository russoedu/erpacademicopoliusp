<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bibliotecario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bibliotecario), array('view', 'id'=>$data->id_bibliotecario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_users_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_users_id); ?>
	<br />


</div>