$(document).ready(function () {
    cont = 0;
    total = 0;
    precios = [];

    document.getElementById('apellido').focus();

    //metodo ajax relacionado con OBTENER_NUMORDEN en controlador INGRESAR_ORDENES para que aparezca el num de protocolo
    $.ajax({
        url: "http://localhost/laboratorio/ingresar_ordenes/obtener_numorden",
        type: 'post',
        data: {},
        success: function (data) {

           data = parseFloat(data) + 1;
            fila = '<input id="id_orden" type="text" class="form-control"value="' + data + '">';
            $('#protocolo').append(fila);
        },
        error: function () {
            alert('OCURRIO UN PROBLEMA PARA ENCONTRAR EL NUMERO DE ORDEN');
        }
    });

    //funcion del boton AGREGAR para agregar analisis a la tabla analisis, relacionado por ajax con OBTENER_ANALISIS en controlador INGRESAR_ORDENES
    $('#bt_add').click(function (e) {
        e.preventDefault();
        var valor = $('#tags-analisis').val();
        var num_orden = $('#num_orden').val();
        var num_afil = $('#num_afil').val();
        var checkbox;
        var tipo=0;//0 es texto, 1 es numero

        if (!isNaN(valor)){tipo=1;}
        if (num_orden != 0 && num_afil != 0) { checkbox = 1; }

        $.ajax({
            url: "http://localhost/laboratorio/ingresar_ordenes/obtener_analisis",
            type: 'post',
            data: {valor: valor, tipo: tipo},
            success: function (data) {
                datos = JSON.parse(data);
                cont++;
                var tr;
                var preciot;
                var precioa;


                $('#precio_total').replaceWith('<div id="precio_total" class="col-md-6 col-sm-6 col-xs-14"> </div>');
           //     $('#precio_analisis').replaceWith('<div id="precio_analisis" class="col-md-6 col-sm-6 col-xs-14"></div>');

                if (checkbox == 1) { // esta autorizado asi que el precio del analisis queda en 0 y no se suma nada
                    tr = '<tr class="even pointer" data-fila="' + datos[0].codigoanalisis + '" id="' + cont + '" onclick="seleccionar(this.id);"><td class=" ">' + cont + '</td><td class=" ">' + datos[0].nombreanalisis + '</td><td class=" ">' + datos[0].codigoanalisis + '</td><td class="a-center "><input class="check" name="check' + cont + '" type="checkbox" onclick="metodoClick(' + cont + ')" class="checkclass" checked></td><td><span id="eliminar_fila"  class="glyphicon glyphicon-trash"></span></td></tr>';
           //         precioa = '<input type="text" class="form-control" id="precio_an" value="' + 0 + '">';
                    preciot = '<input type="text" class="form-control" id="total" value="' + total + '">';
                } else {
                    total = total + parseFloat(datos[0].precionbu);
                    tr = '<tr class="even pointer" data-fila="' + datos[0].codigoanalisis + '" id="' + cont + '" onclick="seleccionar(this.id);"><td class=" ">' + cont + '</td><td class=" ">' + datos[0].nombreanalisis + '</td><td class=" ">' + datos[0].codigoanalisis + '</td><td class="a-center "><input class="check" name="check' + cont + '" type="checkbox" onclick="metodoClick(' + cont + ')" class="checkclass"></td><td id="eliminar_fila" class="glyphicon glyphicon-trash"></td></tr>';
           //         precioa = '<input type="text" class="form-control" id="precio_an" value="' + datos[0].precionbu + '" onchange="metodoOnChange(' + cont + ')">';
                    preciot = '<input type="text" class="form-control" id="total" value="' + total + '">';

                }
                precios.push(datos[0].precionbu);
                $('#tbody').append(tr);
           //     $('#precio_analisis').append(precioa);
                $('#precio_total').append(preciot);
                reordenar();

            }
        });
        $('#tags-analisis').replaceWith('<input id="tags-analisis" type="text" class="form-control">');
        document.getElementById('tags-analisis').focus();
    });

    //funcion del boton ELIMINAR para eliminar analisis de la tabla analisis
    $('#bt_del').click(function () {
        eliminar(id_fila_selected);
    });

    //funcion del boton ELIMINAR TODOO para eliminar todos los analisis de la tabla analisis
    $('#bt_delall').click(function () {
        eliminarTodasFilas();
    });

    //funcion del boton ACEPTAR para guardar la orden en la BD
    $("#enviar").click(function (e) {
        e.preventDefault();

        var analisis = new Array();
        var arreglo = new Array();

        $('#tabla tbody tr').each(function (index) {
                ana = $(this).attr('data-fila');
                check=$('td:eq( 3 ) .check',this).is(':checked');
                analisis[index] = [ana,check];
        });

        console.log(analisis);

        var idorden = $('#id_orden').val();
        var fecha = $('#fecha').val();
        var apellido = $('#apellido').val();
        var nombre = $('#nombre').val();
        var apellidomed = $('#tags-medico').val();
        var os = $('#tags-OS').val();
        var num_orden = $('#num_orden').val();
        var num_afil = $('#num_afil').val();
        var total = $('#total').val();
        var pagado = $('#pagado_inp').val();
        arreglo = [idorden, fecha, apellido, nombre, apellidomed, os, num_orden, num_afil, total, pagado];

        if (analisis.length > 0) {

            var orden = JSON.stringify(arreglo);
            var analisisjs = JSON.stringify(analisis);

            $.ajax({
                url: "http://localhost/laboratorio/ingresar_ordenes/cargar_ordenes",
                type: 'post',
                data: {orden: orden, analisis: analisisjs},
                success: function (data) {
                    $('.alert').fadeIn();
                    setTimeout(function(){ $('.alert').fadeOut() }, 3000);
                    window.location.href = 'http://localhost/laboratorio/index.php';
                },
                error: function () {
                    $('.alert2').fadeIn();
                    setTimeout(function(){ $('.alert2').fadeOut() }, 3000);
                }
            });
        }
        else {
            alert('NINGUN ANALISIS FUE SELECCIONADO');
        }
    });

    //funcion del boton LIMPIAR para dejar vacios todos los campos
    $("#limpiar").click(function () {
        $('#apellido').replaceWith('<input id="apellido" type="text"  data-validate-length-range="6" class="form-control" placeholder="" required="required">');
        $('#nombre').replaceWith('<input id="nombre" type="text" class="form-control" placeholder="" required="required">');
        $('#tags-medico').replaceWith('<input id="tags-medico" type="text" class="form-control" >');
        $('#tags-OS').replaceWith('<input id="tags-OS" type="text" class="form-control">');
        $('#tags-analisis').replaceWith('<input id="tags-analisis" type="text" class="form-control">');
        $('#precio_total').replaceWith('<div id="precio_total" class="col-md-6 col-sm-6 col-xs-14"></div>');
        $('#pagado').replaceWith('<div id="pagado" class="col-md-6 col-sm-6 col-xs-14"><input type="text" class="form-control" id="pagado"></div>');
        eliminarTodasFilas();
    });

    //metodo del icono "basurero" para eliminar una sola fila
    $("body").on('click','.glyphicon-trash',function () { ///porque es dinamica
        tr=$(this).parent(); //con jquery
        // varÜ padre=document.getElementById('eliminar_fila').parentNode.parentNode; // con javascript

//Ironm@n338276

        id=tr.attr('id');
        tr.remove();
        reordenar();

        total = total - parseFloat(precios[parseFloat(id)-1]);
        input_total = document.querySelector('#total');
        input_total.setAttribute("value",total);
    });

    /* funcion para el DATEPICKER */
  /*  var date_input = $('input[name="date"]');
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    }).datepicker("setDate", new Date());*/
    /* FIN DATEPICKER */
});
id_fila_selected = [];
//funcion para cambiar de estado el CHECKBOX
function metodoClick(id) {
    var check;
    switch (id) {
        case 1 :
            check = document.form_ppal.check1.checked;
            break;
        case 2 :
            check = document.form_ppal.check2.checked;
            break;
        case 3 :
            check = document.form_ppal.check3.checked;
            break;
        case 4 :
            check = document.form_ppal.check4.checked;
            break;
        case 5 :
            check = document.form_ppal.check5.checked;
            break;
        case 6 :
            check = document.form_ppal.check6.checked;
            break;
        case 7 :
            check = document.form_ppal.check7.checked;
            break;
        case 8 :
            check = document.form_ppal.check8.checked;
            break;
        case 9 :
            check = document.form_ppal.check9.checked;
            break;
        case 10 :
            check = document.form_ppal.check10.checked;
            break;
        default:
            alert('no hay analisis');
    }

    //alert(check);
    if (check == false) { //esta autorizado y lo cambio para no autorizado

        total = total + parseFloat(precios[ parseFloat(id)-1]);

   //     input_analisis = document.querySelector('#precio_an');
   //     input_analisis.setAttribute("value",precios[ parseFloat(id)-1]);
        input_total = document.querySelector('#total');
        input_total.setAttribute("value",total);
    } else {
        //alert('no esta autorizado');

        total = total - parseFloat(precios[ parseFloat(id)-1]);

   //     input_analisis = document.querySelector('#precio_an');
   //     input_analisis.setAttribute("value",precios[ parseFloat(id)-1]);
        input_total = document.querySelector('#total');
        input_total.setAttribute("value",total);
    }
}

//funcion general para eliminar un elemento de un arreglo
function removeItemFromArr ( arr, item ) {
    var i = arr.indexOf( item );

    if ( i !== -1 ) {
        arr.splice( i, 1 );
    }
}

//funcion SELECCIONAR de cada fila para agregar clase css a la fila
function seleccionar(id_fila) {

    if ($('#' + id_fila).hasClass('seleccionada')) {
        $('#' + id_fila).removeClass('seleccionada');
        removeItemFromArr( id_fila_selected, id_fila );
    }
    else {
        id_fila_selected.push(id_fila);
        $('#' + id_fila).addClass('seleccionada');
   //     input_analisis = document.querySelector('#precio_an');
   //     input_analisis.setAttribute("value",precios[ parseFloat(id_fila)-1]);
    }
}

//funcion para ELIMINAR una fila y actualizar precio total
function eliminar(id_fila) {
    for (var i = 0; i < id_fila.length; i++) {
        $('#' + id_fila[i]).remove();
        total = total - parseFloat(precios[ parseFloat(id_fila[i])-1]);
    }
    reordenar();

    input_total = document.querySelector('#total');
    input_total.setAttribute("value",total);

    id_fila_selected = [];
}

//funcion para REORDENAR las filas una vez
function reordenar() {
    var num = 1;
    $('#tabla tbody tr').each(function () {
        $(this).find('td').eq(0).text(num);
        num++;
    });
}

//funcion del ELIMINAR TODAS las filas de la tabla analisis
function eliminarTodasFilas() {
    $('#tabla tbody tr').each(function () {
        $(this).remove();
    });

    cont = 0;
    total = 0;

    $('#precio_analisis').replaceWith('<div id="precio_analisis" class="col-md-6 col-sm-6 col-xs-14"></div>');
    input_total = document.querySelector('#total');
    input_total.setAttribute("value",total);

}
