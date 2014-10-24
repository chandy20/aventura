
<div class="torniquetes index" align='center'>
    <h1><?php echo __('Torniquetes'); ?></h1>
    <table cellpadding="0" cellspacing="0" class="container" >
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id', 'nombre'); ?></th>
                <th><?php echo $this->Paginator->sort('tipo_id', 'Tipo'); ?></th>
                <th><?php echo $this->Paginator->sort('locacione_id', 'Entrada'); ?></th>
                <th><?php echo $this->Paginator->sort('grupo_id', 'Grupo'); ?></th>
                <th><?php echo $this->Paginator->sort('centradas', 'Entradas'); ?></th>
                <th><?php echo $this->Paginator->sort('csalidas', 'Salidas'); ?></th>
                <th class="actions"><?php echo __('Operaciones'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($torniquetes as $torniquete): ?>
                <tr>
                    <td><?php echo h('Torniquete ' . $torniquete['Torniquete']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo ($torniquete['Tipo']['nombre_tipo']); ?>
                    </td>
                    <td>
                        <?php echo ($torniquete['Locacione']['nombre_locacion']); ?>
                    </td>
                    <td>
                        <?php echo ($torniquete['Grupo']['nombre_grupo']); ?>
                    </td>
                    <td><?php echo h($torniquete['Torniquete']['centradas']); ?>&nbsp;</td>
                    <td><?php echo h($torniquete['Torniquete']['csalidas']); ?>&nbsp;</td>
                    <td class="actions">

                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $torniquete['Torniquete']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Borrrar'), array('action' => 'delete', $torniquete['Torniquete']['id']), array(), __('Are you sure you want to delete # %s?', $torniquete['Torniquete']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Pagina {:page} de {:pages}, motrando {:current} de {:count} totales, iniciando en {:start}, termianndo en {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
