<div class="entradasSalidasAnos view">
<h2><?php echo __('Entradas Salidas Ano'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasAno['EntradasSalidasAno']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Torniquete'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entradasSalidasAno['Torniquete']['id'], array('controller' => 'torniquetes', 'action' => 'view', $entradasSalidasAno['Torniquete']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasAno['EntradasSalidasAno']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entradas'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasAno['EntradasSalidasAno']['entradas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salidas'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasAno['EntradasSalidasAno']['salidas']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entradas Salidas Ano'), array('action' => 'edit', $entradasSalidasAno['EntradasSalidasAno']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entradas Salidas Ano'), array('action' => 'delete', $entradasSalidasAno['EntradasSalidasAno']['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasAno['EntradasSalidasAno']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Anos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Ano'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
