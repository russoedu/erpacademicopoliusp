<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo CHtml::errorSummary($model); ?>


	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'isbn'); ?>
		<?php echo CHtml::activeTextField($model,'isbn'); ?>
		<?php echo CHtml::error($model,'isbn'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'exemplar'); ?>
		<?php echo CHtml::activeTextField($model,'exemplar'); ?>
		<?php echo CHtml::error($model,'exemplar'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'titulo'); ?>
		<?php echo CHtml::activeTextField($model,'titulo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo CHtml::error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'autor'); ?>
		<?php echo CHtml::activeTextField($model,'autor',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo CHtml::error($model,'autor'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'editora'); ?>
		<?php echo CHtml::activeTextField($model,'editora',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo CHtml::error($model,'editora'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'ano'); ?>
		<?php echo CHtml::activeTextField($model,'ano',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo CHtml::error($model,'ano'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'edicao'); ?>
		<?php echo CHtml::activeTextField($model,'edicao'); ?>
		<?php echo CHtml::error($model,'edicao'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'local'); ?>
		<?php echo CHtml::activeTextField($model,'local',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo CHtml::error($model,'local'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->