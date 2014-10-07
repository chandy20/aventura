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
                <td><input type="button" value="Ver" name="1" id="1" onclick="javascript:reporte(1, 148, 123);"></td>
                <td><input type="button" value="Ver" name="2" id="2" onclick="javascript:reporte(2, 201, 267);"></td>
                <td><input type="button" value="Ver" name="3" id="3" onclick="javascript:reporte(3, 19, 98);"></td>
                <td><input type="button" value="Ver" name="4" id="4" onclick="javascript:reporte(4, 5, 2);"></td>
                <td><input type="button" value="Ver" name="5" id="5" onclick="javascript:reporte(5, 56, 265);"></td>
                <td><input type="button" value="Ver" name="6" id="6" onclick="javascript:reporte(6, 254, 176);"></td>
                <td><input type="button" value="Ver" name="7" id="7" onclick="javascript:reporte(7, 342, 212);"></td>
                <td><input type="button" value="Ver" name="8" id="8" onclick="javascript:reporte(8, 54, 32);"></td>
                <td><input type="button" value="Ver" name="9" id="9" onclick="javascript:reporte(9, 65, 23);"></td>
                <td><input type="button" value="Ver" name="10" id="10" onclick="javascript:reporte(10, 87, 34);"></td>
                <td><input type="button" value="Ver" name="11" id="11" onclick="javascript:reporte(11, 52, 13);"></td>
                <td><input type="button" value="Ver" name="12" id="12" onclick="javascript:reporte(12, 5, 8);"></td>
                <td><input type="button" value="Ver" name="13" id="13" onclick="javascript:reporte(13, 54, 67);"></td>
                <td><input type="button" value="Ver" name="14" id="14" onclick="javascript:reporte(14, 21, 32);"></td>
                <td><input type="button" value="Ver" name="15" id="15" onclick="javascript:reporte(15, 65, 11);"></td>
                <td><input type="button" value="Ver" name="16" id="16" onclick="javascript:reporte(16, 23, 15);"></td>

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
    
    function reporte(t,x, y){
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
				['Entradas',x],
				['Salidas',y]
			]
		}]
	});
    }			

</script>