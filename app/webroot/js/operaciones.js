/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var urlbase = "http://192.168.0.2:85/aventura/";
function ajax(url2, datos, callback)
{

    //checkInternet();
    var retornar = null;
    $.ajax({
        url: url2,
        type: "POST",
        timeout: 10000,
        data: datos,
        headers: {'Access-Control-Allow-Origin': '*'},
        crossDomain: true,
        error: function(jqXHR, textStatus, errorThrown)
        {

        },
        success: function(data)
        {
            retornar = data;
        }
    }).done(function()
    {
        callback(retornar);
    });
}
function conMayusculas(datos) { 
    return datos.toUpperCase();
}
