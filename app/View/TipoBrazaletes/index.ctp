<div class="tipoBrazaletes index" align="center">
    <h1><?php echo __('Tipos de Pasaporte'); ?></h1>
    <table cellpadding="0" cellspacing="0" class="container">
        <thead>
            <tr>
                <!--<th><?php // echo $this->Paginator->sort('id'); ?></th>-->
                <th><h2><?php echo $this->Paginator->sort('nombre','Nombre del Pasaporte'); ?></h2></th>
                <th class="actions"><h2><?php echo __('Operaciones'); ?></h2></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipoBrazaletes as $tipoBrazalete): ?>
                <tr>
                    <!--<td><?php // echo h($tipoBrazalete['TipoBrazalete']['id']); ?>&nbsp;</td>-->
                    <td><?php echo h($tipoBrazalete['TipoBrazalete']['nombre']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $tipoBrazalete['TipoBrazalete']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $tipoBrazalete['TipoBrazalete']['id']), array(), __('Esta seguro que desea borrar %s?', $tipoBrazalete['TipoBrazalete']['nombre'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
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