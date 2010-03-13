<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_professor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_professor), array('view', 'id'=>$data->id_professor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_users_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_users_id); ?>
	<br />


</div>