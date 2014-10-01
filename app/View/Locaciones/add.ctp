<link href = "../../webroot/css/style.css" rel = "stylesheet" type = "text/css" media = "all" />
<div class="locaciones form">
<?php echo $this->Form->create('Crear Locación'); ?>
	<fieldset>
		<legend><?php echo __('Add Locacione'); ?></legend>
	<?php
		echo $this->Form->input('cod_locacion');
		echo $this->Form->input('nombre_locacion');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Locaciones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
