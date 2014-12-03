<?php
echo $this->Html->script(array('jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius'));
?>
<?php echo $this->Form->create('Torniquetes'); ?>
<div class="torniquetes dia" align="center">
    <table>
        <tr><td>
                <table>
                    <tr>
                        <td align="center"><h1>Entradas y salidas por pasaporte</h1><br></td>
                    </tr>

                    <tr>
                        <td align="center">
                            <label>Fecha</label>
                            <div>
                                <?php
                                echo $this->Form->input('fecha', array('label' => '', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true'));
                                ?>
                                <img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector" name="selector" style="cursor:pointer" />
                                <br><br>
                                <input type="button" id="generar" name="generar" value="Generar">
                            </div></td>
                    </tr>        
                </table>
            </td>           
        </tr>
    </table>

</div>
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
<script>
    $("#generar").click(function() {
//        alert("entro");
        var fecha = $("#TorniquetesFecha").val();
        window.location = urlbase + "Torniquetes/pasaporte/" + fecha;
    });
</script>
