<div class="locaciones form" align='center'>
<?php echo $this->Form->create('locacione'); ?>
	<fieldset>
            <legend><h1><?php echo __('Crear Entrada'); ?></h1></legend>
                <table>
                    <tr>
                        <td>Código de Entrada</td>
                        <td><?php echo $this->Form->input('cod_locacion', array('label'=>'')); ?></td>
                    </tr>
                    <tr>
                        <td>Nombre de Entrada</td>
                        <td><?php echo $this->Form->input('nombre_locacion', array('label'=>'')); ?></td>
                    </tr>
                    <tr>
                        <td>Descripción de Entrada</td>
                        <td><?php echo $this->Form->input('descripcion', array('label'=>'')); ?></td>
                    </tr>
                    
                </table>
	<?php
		
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>