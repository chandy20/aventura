<div class="tipos form">
<?php echo $this->Form->create('Tipo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('codigo_tipo');
		echo $this->Form->input('nombre_tipo');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tipo.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Tipo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('action' => 'index')); ?></li>
	</ul>
</div>
