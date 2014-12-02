<?php
echo $this->Html->script(array('jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius'));
?>
<?php echo $this->Form->create('Observaciones'); ?>
<div class="torniquetes dia" align="center">
    <h1>Registro de observaciones</h1><br>
    <br>
    <label>Fecha</label>
    <div>
        <?php
        echo $this->Form->input('fecha', array('label' => '', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true'));
        ?>
        <img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector" name="selector" style="cursor:pointer" />

    </div>
    <br>
    <label>Observaciones</label>
    <?php
    echo $this->Form->input('observaciones', array('label' => '', 'required' => 'true'));
    ?>
    <br><br>
    <input type="submit" id="registrar" name="registrar" value="Registrar">
</div>
</form>
<script>
    Calendar.setup({
        inputField: "TorniquetesFecha",
        trigger: "selector",
        onSelect: function() {
            this.hide();
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
