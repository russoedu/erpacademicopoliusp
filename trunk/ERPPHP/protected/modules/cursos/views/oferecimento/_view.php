<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_oferecimento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_oferecimento), array('view', 'id'=>$data->id_oferecimento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_disciplina')); ?>:</b>
	<?php echo CHtml::encode($data->id_disciplina); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_professor')); ?>:</b>
	<?php echo CHtml::encode($data->id_professor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_turma')); ?>:</b>
	<?php echo CHtml::encode($data->id_turma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sala')); ?>:</b>
	<?php echo CHtml::encode($data->id_sala); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->data_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_fim')); ?>:</b>
	<?php echo CHtml::encode($data->data_fim); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('vagas')); ?>:</b>
	<?php echo CHtml::encode($data->vagas); ?>
	<br />

	*/ ?>

</div>