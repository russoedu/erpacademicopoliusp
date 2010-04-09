<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_curso'); ?>
		<?php 
			echo CHtml::activeDropDownList($model, 'id_curso',
				CHtml::listData(
					$cursos,'id_curso','nome')
			); 
		?>
		<?php echo CHtml::error($model,'id_curso'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_professor_responsavel'); ?>
		<?php echo CHtml::activeTextField($model,'id_professor_responsavel'); ?>
		<?php echo CHtml::error($model,'id_professor_responsavel'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'nome'); ?>
		<?php echo CHtml::activeTextField($model,'nome',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo CHtml::error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'sigla'); ?>
		<?php echo CHtml::activeTextField($model,'sigla',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo CHtml::error($model,'sigla'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'creditos_aula'); ?>
		<?php echo CHtml::activeTextField($model,'creditos_aula'); ?>
		<?php echo CHtml::error($model,'creditos_aula'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'creditos_trabalho'); ?>
		<?php echo CHtml::activeTextField($model,'creditos_trabalho'); ?>
		<?php echo CHtml::error($model,'creditos_trabalho'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'semestre'); ?>
		<?php echo CHtml::activeTextField($model,'semestre'); ?>
		<?php echo CHtml::error($model,'semestre'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'programa'); ?>
		<?php echo CHtml::activeTextArea($model,'programa',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo CHtml::error($model,'programa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->
