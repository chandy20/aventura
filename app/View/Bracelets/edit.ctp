<div class="bracelets form">
<?php echo $this->Form->create('Bracelet'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bracelet'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date');
		echo $this->Form->input('cod_barras');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bracelet.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Bracelet.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bracelets'), array('action' => 'index')); ?></li>
	</ul>
</div>
