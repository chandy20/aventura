<div class="torniquetes reportes">

    <table class="container">
        <thead>            
            <tr>
                <th colspan="8" align="center"> ENTRADA 1 </th>
                <th colspan="8" align="center"> ENTRADA 2 </th>
            </tr>

            <tr>
                <td>T. 1</td>
                <td>T. 2</td>
                <td>T. 3</td>
                <td>T. D. 4</td>
                <td>T. 5</td>
                <td>T. 6</td>
                <td>T. 7</td>
                <td>T. 8</td>
                <td>T. 9</td>
                <td>T. 10</td>
                <td>T. 11</td>
                <td>T.D. 12</td>
                <td>T. 13</td>
                <td>T. 14</td>
                <td>T.15</td>
                <td>T. 16</td>                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="button" value="Ver" name="1" id="1" onclick="javascript:reporte(1);"></td>
                <td><input type="button" value="Ver" name="2" id="2" ></td>
                <td><input type="button" value="Ver" name="3" id="3" ></td>
                <td><input type="button" value="Ver" name="4" id="4" ></td>
                <td><input type="button" value="Ver" name="5" id="5" ></td>
                <td><input type="button" value="Ver" name="6" id="6" ></td>
                <td><input type="button" value="Ver" name="7" id="7" ></td>
                <td><input type="button" value="Ver" name="8" id="8" ></td>
                <td><input type="button" value="Ver" name="9" id="9" ></td>
                <td><input type="button" value="Ver" name="10" id="10" ></td>
                <td><input type="button" value="Ver" name="11" id="11" ></td>
                <td><input type="button" value="Ver" name="12" id="12" ></td>
                <td><input type="button" value="Ver" name="13" id="13" ></td>
                <td><input type="button" value="Ver" name="14" id="14" ></td>
                <td><input type="button" value="Ver" name="15" id="15" ></td>
                <td><input type="button" value="Ver" name="16" id="16" ></td>

            </tr>
        </tbody>
    </table>
    <br>
    <table class="container">
        <tr>
            <th><div id="graficaCircular"></div></th>
        </tr>
    </table>
</div>
<script>
    
    function reporte(t){
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'graficaCircular'
		},
		title: {
			text: 'Cantidad de Entradas/Salidas Torniquete No. ' + t
		},
		subtitle: {
			text: 'Mundo Aventura'
		},
		plotArea: {
			shadow: null,
			borderWidth: null,
			backgroundColor: null
		},
		tooltip: {
			formatter: function() {
				return '<b>'+ this.point.name +'</b>: '+ this.y;
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					color: '#000000',
					connectorColor: '#000000',
					formatter: function() {
						return '<b>'+ this.point.name +'</b>: '+ this.y;
					}
				}
			}
		},
                series: [{
			type: 'pie',
			name: 'Browser share',
			data: [
				['Entradas',350],
				['Salidas',180]
			]
		}]
	});
    }			

</script>