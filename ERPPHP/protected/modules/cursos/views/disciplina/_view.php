<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sigla')); ?>:</b>
	<?php echo CHtml::encode($data->sigla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ementa')); ?>:</b>
	<?php echo CHtml::encode($data->ementa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('professoresResponsaveis')); ?>:</b>
	<?php echo CHtml::encode($data->professoresResponsaveis); ?>
	<br />


</div>