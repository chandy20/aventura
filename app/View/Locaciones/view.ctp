<div class="locaciones view">
<h2><?php echo __('Locacione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($locacione['Locacione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cod Locacion'); ?></dt>
		<dd>
			<?php echo h($locacione['Locacione']['cod_locacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Locacion'); ?></dt>
		<dd>
			<?php echo h($locacione['Locacione']['nombre_locacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($locacione['Locacione']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Locacione'), array('action' => 'edit', $locacione['Locacione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Locacione'), array('action' => 'delete', $locacione['Locacione']['id']), array(), __('Are you sure you want to delete # %s?', $locacione['Locacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Locacione'), array('action' => 'add')); ?> </li>
	</ul>
</div>
