<div class="entradasSalidasMinutos form">
<?php echo $this->Form->create('EntradasSalidasMinuto'); ?>
	<fieldset>
		<legend><?php echo __('Add Entradas Salidas Minuto'); ?></legend>
	<?php
		echo $this->Form->input('fecha');
		echo $this->Form->input('hour');
		echo $this->Form->input('entradas');
		echo $this->Form->input('salidas');
		echo $this->Form->input('torniquete_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Entradas Salidas Minutos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
