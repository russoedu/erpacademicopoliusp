<div class="view">

        <b><?php echo CHtml::encode('Título'); ?>:</b>
	<?php echo CHtml::encode($data->livro->titulo); ?>
	<br />

	<b><?php echo CHtml::encode('Retirada'); ?>:</b>
	<?php $data_retirada = date("d/m/Y",strtotime($data->data_retirada));
            echo CHtml::encode($data_retirada); ?>
	<br />

	<b><?php echo CHtml::encode('Devolução Prevista'); ?>:</b>
	<?php $data_devolucao = date("d/m/Y",strtotime($data->data_devolucao));
            echo CHtml::encode($data_devolucao); ?>
	<br />

        <b><?php echo CHtml::encode('Status'); ?>:</b>
        <?php $today = strtotime(date("Y-m-d"));
              if (isset($data->data_devolucao_efetiva)) {
                      echo 'FINALIZADO';
              }
              elseif (strtotime($data->data_devolucao) > $today)
                      echo 'OK';
              elseif (strtotime($data->data_devolucao) < $today)
                      echo 'ATRASADO';
              else
                      echo 'ENTREGA HOJE';
               ?>
        <br />

        <b><?php if (isset($data->data_devolucao_efetiva))
                   echo CHtml::encode('Data Devolução:');?></b>
        <?php if (isset($data->data_devolucao_efetiva)) {
                    $today = strtotime(date("Y-m-d"));
                    $data_devolucao = date("d/m/Y",strtotime($data->data_devolucao_efetiva));
                    echo CHtml::encode($data_devolucao);
              }
               ?>

</div>