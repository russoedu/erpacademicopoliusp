<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_disciplina'); ?>
		<?php echo CHtml::activeTextField($model,'id_disciplina'); ?>
		<?php echo CHtml::error($model,'id_disciplina'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_professor'); ?>
		<?php echo CHtml::activeTextField($model,'id_professor'); ?>
		<?php echo CHtml::error($model,'id_professor'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_turma'); ?>
		<?php echo CHtml::activeTextField($model,'id_turma'); ?>
		<?php echo CHtml::error($model,'id_turma'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_sala'); ?>
		<?php echo CHtml::activeTextField($model,'id_sala'); ?>
		<?php echo CHtml::error($model,'id_sala'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'data_inicio'); ?>
		<?php echo CHtml::activeTextField($model,'data_inicio'); ?>
		<?php echo CHtml::error($model,'data_inicio'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'data_fim'); ?>
		<?php echo CHtml::activeTextField($model,'data_fim'); ?>
		<?php echo CHtml::error($model,'data_fim'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'vagas'); ?>
		<?php echo CHtml::activeTextField($model,'vagas'); ?>
		<?php echo CHtml::error($model,'vagas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->