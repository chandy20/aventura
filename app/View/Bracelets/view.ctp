<div class="bracelets view">
<h2><?php echo __('Bracelet'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bracelet['Bracelet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($bracelet['Bracelet']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cod Barras'); ?></dt>
		<dd>
			<?php echo h($bracelet['Bracelet']['cod_barras']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bracelet'), array('action' => 'edit', $bracelet['Bracelet']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bracelet'), array('action' => 'delete', $bracelet['Bracelet']['id']), array(), __('Are you sure you want to delete # %s?', $bracelet['Bracelet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bracelets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bracelet'), array('action' => 'add')); ?> </li>
	</ul>
</div>
