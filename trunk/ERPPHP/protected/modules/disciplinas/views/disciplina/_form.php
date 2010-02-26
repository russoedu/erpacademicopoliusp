<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'nome'); ?>
		<?php echo CHtml::activeTextField($model,'nome',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo CHtml::error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'sigla'); ?>
		<?php echo CHtml::activeTextField($model,'sigla',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo CHtml::error($model,'sigla'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'ementa'); ?>
		<?php echo CHtml::activeTextArea($model,'ementa',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo CHtml::error($model,'ementa'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'professoresResponsaveis'); ?>
		<?php echo CHtml::activeTextField($model,'professoresResponsaveis',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo CHtml::error($model,'professoresResponsaveis'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->