<div class="grupos view">
<h2><?php echo __('Grupo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo Grupo'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['codigo_grupo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Grupo'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['nombre_grupo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Grupo'), array('action' => 'edit', $grupo['Grupo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Grupo'), array('action' => 'delete', $grupo['Grupo']['id']), array(), __('Are you sure you want to delete # %s?', $grupo['Grupo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Torniquetes'); ?></h3>
	<?php if (!empty($grupo['Torniquete'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipo Id'); ?></th>
		<th><?php echo __('Locacione Id'); ?></th>
		<th><?php echo __('Grupo Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Serial'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($grupo['Torniquete'] as $torniquete): ?>
		<tr>
			<td><?php echo $torniquete['id']; ?></td>
			<td><?php echo $torniquete['tipo_id']; ?></td>
			<td><?php echo $torniquete['locacione_id']; ?></td>
			<td><?php echo $torniquete['grupo_id']; ?></td>
			<td><?php echo $torniquete['descripcion']; ?></td>
			<td><?php echo $torniquete['serial']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'torniquetes', 'action' => 'view', $torniquete['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'torniquetes', 'action' => 'edit', $torniquete['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'torniquetes', 'action' => 'delete', $torniquete['id']), array(), __('Are you sure you want to delete # %s?', $torniquete['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
