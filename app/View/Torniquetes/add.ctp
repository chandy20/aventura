<div class="torniquetes form">
<?php echo $this->Form->create('Torniquete'); ?>
	<fieldset>
		<legend><?php echo __('Add Torniquete'); ?></legend>
	<?php
		echo $this->Form->input('tipo_id');
		echo $this->Form->input('locacione_id');
		echo $this->Form->input('grupo_id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('serial');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Torniquetes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('controller' => 'tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo'), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locaciones'), array('controller' => 'locaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Locacione'), array('controller' => 'locaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Anos'), array('controller' => 'entradas_salidas_anos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Ano'), array('controller' => 'entradas_salidas_anos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Dias'), array('controller' => 'entradas_salidas_dias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Dia'), array('controller' => 'entradas_salidas_dias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Horas'), array('controller' => 'entradas_salidas_horas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Hora'), array('controller' => 'entradas_salidas_horas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Mese'), array('controller' => 'entradas_salidas_mese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Mese'), array('controller' => 'entradas_salidas_mese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Minutos'), array('controller' => 'entradas_salidas_minutos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Minuto'), array('controller' => 'entradas_salidas_minutos', 'action' => 'add')); ?> </li>
	</ul>
</div>
