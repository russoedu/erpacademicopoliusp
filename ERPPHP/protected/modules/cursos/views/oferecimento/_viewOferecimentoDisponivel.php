<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_oferecimento')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode(disciplina::model()->findByPk($data->id_disciplina)->nome . '-' .$data->id_turma),
                array('view', 'id'=>$data->id_oferecimento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_professor')); ?>:</b>
	<?php echo CHtml::encode(professor::model()->findByPk($data->id_professor)->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_turma')); ?>:</b>
	<?php echo CHtml::encode($data->id_turma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sala')); ?>:</b>
	<?php echo CHtml::encode($data->id_sala); ?>
	<br />

	<b><?php echo CHtml::encode("Data de Início"); ?>:</b>
	<?php echo CHtml::encode(date("d/m/Y", strtotime($data->data_inicio))); ?>
	<br />

	<b><?php echo CHtml::encode("Data de Término"); ?>:</b>
	<?php echo CHtml::encode(date("d/m/Y", strtotime($data->data_fim))); ?>
	<br />

	<b><?php echo CHtml::encode("Vagas Disponíveis"); ?>:</b>
	<?php echo CHtml::encode($data->vagas); ?>
	<br />

        <?php echo CHtml::link("Inscrever-se", array('inscricaoOferecimento', 'id_aluno'=>$data->id_aluno, 'id_oferecimento'=>$data->id_oferecimento)); ?>
</div>