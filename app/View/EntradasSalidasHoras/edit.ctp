<div class="entradasSalidasHoras form">
<?php echo $this->Form->create('EntradasSalidasHora'); ?>
	<fieldset>
		<legend><?php echo __('Edit Entradas Salidas Hora'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('torniquete_id');
		echo $this->Form->input('fecha');
		echo $this->Form->input('hora');
		echo $this->Form->input('entradas');
		echo $this->Form->input('salidas');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EntradasSalidasHora.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('EntradasSalidasHora.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Horas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
