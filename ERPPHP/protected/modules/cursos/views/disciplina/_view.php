<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_disciplina')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_disciplina), array('view', 'id'=>$data->id_disciplina)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curso')); ?>:</b>
	<?php echo CHtml::encode($data->id_curso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_professor_responsavel')); ?>:</b>
	<?php echo CHtml::encode($data->id_professor_responsavel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sigla')); ?>:</b>
	<?php echo CHtml::encode($data->sigla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditos_aula')); ?>:</b>
	<?php echo CHtml::encode($data->creditos_aula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditos_trabalho')); ?>:</b>
	<?php echo CHtml::encode($data->creditos_trabalho); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('semestre')); ?>:</b>
	<?php echo CHtml::encode($data->semestre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('programa')); ?>:</b>
	<?php echo CHtml::encode($data->programa); ?>
	<br />

	*/ ?>

</div>