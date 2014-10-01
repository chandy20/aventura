<div class="torniquetes view">
<h2><?php echo __('Torniquete'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($torniquete['Torniquete']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($torniquete['Tipo']['id'], array('controller' => 'tipos', 'action' => 'view', $torniquete['Tipo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Locacione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($torniquete['Locacione']['id'], array('controller' => 'locaciones', 'action' => 'view', $torniquete['Locacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($torniquete['Grupo']['id'], array('controller' => 'grupos', 'action' => 'view', $torniquete['Grupo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($torniquete['Torniquete']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serial'); ?></dt>
		<dd>
			<?php echo h($torniquete['Torniquete']['serial']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Torniquete'), array('action' => 'edit', $torniquete['Torniquete']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Torniquete'), array('action' => 'delete', $torniquete['Torniquete']['id']), array(), __('Are you sure you want to delete # %s?', $torniquete['Torniquete']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('controller' => 'tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo'), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locaciones'), array('controller' => 'locaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Locacione'), array('controller' => 'locaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Anos'), array('controller' => 'entradas_salidas_anos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Ano'), array('controller' => 'entradas_salidas_anos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Dias'), array('controller' => 'entradas_salidas_dias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Dia'), array('controller' => 'entradas_salidas_dias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Horas'), array('controller' => 'entradas_salidas_horas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Hora'), array('controller' => 'entradas_salidas_horas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Mese'), array('controller' => 'entradas_salidas_mese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Mese'), array('controller' => 'entradas_salidas_mese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Salidas Minutos'), array('controller' => 'entradas_salidas_minutos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Salidas Minuto'), array('controller' => 'entradas_salidas_minutos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Entradas Salidas Anos'); ?></h3>
	<?php if (!empty($torniquete['EntradasSalidasAno'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Torniquete Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Entradas'); ?></th>
		<th><?php echo __('Salidas'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($torniquete['EntradasSalidasAno'] as $entradasSalidasAno): ?>
		<tr>
			<td><?php echo $entradasSalidasAno['id']; ?></td>
			<td><?php echo $entradasSalidasAno['torniquete_id']; ?></td>
			<td><?php echo $entradasSalidasAno['fecha']; ?></td>
			<td><?php echo $entradasSalidasAno['entradas']; ?></td>
			<td><?php echo $entradasSalidasAno['salidas']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entradas_salidas_anos', 'action' => 'view', $entradasSalidasAno['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entradas_salidas_anos', 'action' => 'edit', $entradasSalidasAno['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entradas_salidas_anos', 'action' => 'delete', $entradasSalidasAno['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasAno['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entradas Salidas Ano'), array('controller' => 'entradas_salidas_anos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Entradas Salidas Dias'); ?></h3>
	<?php if (!empty($torniquete['EntradasSalidasDia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Torniquete Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Entradas'); ?></th>
		<th><?php echo __('Salidas'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($torniquete['EntradasSalidasDia'] as $entradasSalidasDia): ?>
		<tr>
			<td><?php echo $entradasSalidasDia['id']; ?></td>
			<td><?php echo $entradasSalidasDia['torniquete_id']; ?></td>
			<td><?php echo $entradasSalidasDia['fecha']; ?></td>
			<td><?php echo $entradasSalidasDia['entradas']; ?></td>
			<td><?php echo $entradasSalidasDia['salidas']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entradas_salidas_dias', 'action' => 'view', $entradasSalidasDia['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entradas_salidas_dias', 'action' => 'edit', $entradasSalidasDia['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entradas_salidas_dias', 'action' => 'delete', $entradasSalidasDia['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasDia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entradas Salidas Dia'), array('controller' => 'entradas_salidas_dias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Entradas Salidas Horas'); ?></h3>
	<?php if (!empty($torniquete['EntradasSalidasHora'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Torniquete Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Hora'); ?></th>
		<th><?php echo __('Entradas'); ?></th>
		<th><?php echo __('Salidas'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($torniquete['EntradasSalidasHora'] as $entradasSalidasHora): ?>
		<tr>
			<td><?php echo $entradasSalidasHora['id']; ?></td>
			<td><?php echo $entradasSalidasHora['torniquete_id']; ?></td>
			<td><?php echo $entradasSalidasHora['fecha']; ?></td>
			<td><?php echo $entradasSalidasHora['hora']; ?></td>
			<td><?php echo $entradasSalidasHora['entradas']; ?></td>
			<td><?php echo $entradasSalidasHora['salidas']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entradas_salidas_horas', 'action' => 'view', $entradasSalidasHora['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entradas_salidas_horas', 'action' => 'edit', $entradasSalidasHora['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entradas_salidas_horas', 'action' => 'delete', $entradasSalidasHora['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasHora['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entradas Salidas Hora'), array('controller' => 'entradas_salidas_horas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Entradas Salidas Mese'); ?></h3>
	<?php if (!empty($torniquete['EntradasSalidasMese'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Torniquete Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Entradas'); ?></th>
		<th><?php echo __('Salidas'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($torniquete['EntradasSalidasMese'] as $entradasSalidasMese): ?>
		<tr>
			<td><?php echo $entradasSalidasMese['id']; ?></td>
			<td><?php echo $entradasSalidasMese['torniquete_id']; ?></td>
			<td><?php echo $entradasSalidasMese['fecha']; ?></td>
			<td><?php echo $entradasSalidasMese['entradas']; ?></td>
			<td><?php echo $entradasSalidasMese['salidas']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entradas_salidas_mese', 'action' => 'view', $entradasSalidasMese['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entradas_salidas_mese', 'action' => 'edit', $entradasSalidasMese['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entradas_salidas_mese', 'action' => 'delete', $entradasSalidasMese['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasMese['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entradas Salidas Mese'), array('controller' => 'entradas_salidas_mese', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Entradas Salidas Minutos'); ?></h3>
	<?php if (!empty($torniquete['EntradasSalidasMinuto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Hour'); ?></th>
		<th><?php echo __('Entradas'); ?></th>
		<th><?php echo __('Salidas'); ?></th>
		<th><?php echo __('Torniquete Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($torniquete['EntradasSalidasMinuto'] as $entradasSalidasMinuto): ?>
		<tr>
			<td><?php echo $entradasSalidasMinuto['id']; ?></td>
			<td><?php echo $entradasSalidasMinuto['fecha']; ?></td>
			<td><?php echo $entradasSalidasMinuto['hour']; ?></td>
			<td><?php echo $entradasSalidasMinuto['entradas']; ?></td>
			<td><?php echo $entradasSalidasMinuto['salidas']; ?></td>
			<td><?php echo $entradasSalidasMinuto['torniquete_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entradas_salidas_minutos', 'action' => 'view', $entradasSalidasMinuto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entradas_salidas_minutos', 'action' => 'edit', $entradasSalidasMinuto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entradas_salidas_minutos', 'action' => 'delete', $entradasSalidasMinuto['id']), array(), __('Are you sure you want to delete # %s?', $entradasSalidasMinuto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entradas Salidas Minuto'), array('controller' => 'entradas_salidas_minutos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
