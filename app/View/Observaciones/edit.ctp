<div class="observaciones form">
<?php echo $this->Form->create('Observacione'); ?>
	<fieldset>
		<legend><?php echo __('Edit Observacione'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('observacion');
		echo $this->Form->input('fecha');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Observacione.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Observacione.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Observaciones'), array('action' => 'index')); ?></li>
	</ul>
</div>
