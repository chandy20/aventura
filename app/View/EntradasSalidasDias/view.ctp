<div class="entradasSalidasDias view">
<h2><?php echo __('Entradas Salidas Dia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasDia['EntradasSalidasDia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Torniquete'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entradasSalidasDia['Torniquete']['id'], array('controller' => 'torniquetes', 'action' => 'view', $entradasSalidasDia['Torniquete']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasDia['EntradasSalidasDia']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entradas'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasDia['EntradasSalidasDia']['entradas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salidas'); ?></dt>
		<dd>
			<?php echo h($entradasSalidasDia['EntradasSalidasDia']['salidas']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entradas Salidas Dia'), array('action' => 'edit', $entradasSalidasDia['EntradasSalidasDia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entradas Salidas Dia'), array('action' => 'delete', $entradasSalidasDia['EntradasSalidasDia']['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasDia['EntradasSalidasDia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Dias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Dia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
