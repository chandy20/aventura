<div class="observaciones view">
<h2><?php echo __('Observacione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($observacione['Observacione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacion'); ?></dt>
		<dd>
			<?php echo h($observacione['Observacione']['observacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($observacione['Observacione']['fecha']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Observacione'), array('action' => 'edit', $observacione['Observacione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Observacione'), array('action' => 'delete', $observacione['Observacione']['id']), array(), __('Are you sure you want to delete # %s?', $observacione['Observacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Observaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Observacione'), array('action' => 'add')); ?> </li>
	</ul>
</div>
