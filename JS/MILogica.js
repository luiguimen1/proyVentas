/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$.validator.addMethod("texto", function (value, element) {
    return /^[ a-záéíóúüñ]*$/i.test(value);
}, "Ingrese sólo letras o espacios.");


$(document).ready(function () {
    var efe_aja;
    function f_ajax(AdondeVoy, QueLLevo, QueConLoQueTraje) {
        this.efe_aja = $.ajax({
            url: AdondeVoy,
            cache: false,
            beforeSend: function () { /*httpR es la variable global donde guardamos la conexion*/
                $(document).ajaxStop();
                $(document).ajaxStart();
            },
            type: "POST",
            dataType: "html",
            contentType: 'application/x-www-form-urlencoded; charset=utf-8;',
            data: QueLLevo,
            timeout: 8000,
            success: function (datos) {
                QueConLoQueTraje(datos);
            },
            error: function () {
                alert("No hay conexiÃ³n");
            }
        });
    }

    $("#ViProveedor").click(function () {
        var AdondeVoy = "view/Proveedor/index.php";
        var QueLLevo = "acceso=false";
        var QueConLoQueTraje = function (datos) {
            console.log(datos);
            $("#contenido").html(datos);
            $("#tabs").tabs();
        };
        f_ajax(AdondeVoy, QueLLevo, QueConLoQueTraje);

    });
    $("#ViCliente").click(function () {
        var Adondevoy = "view/Clientes/index.php";
        var QueLLevo = "acceso=false";
        var QueConLoQueTarje = function (datos) {
            $("#contenido").html(datos);
            ForAddCliMe();
        };
        f_ajax(Adondevoy, QueLLevo, QueConLoQueTarje);
    });
    function ForAddCliMe() {
        $("#ForAddCliente").click(function () {
            var AdondeVoy = "view/Clientes/ForRegCliente.php";
            var QueLLevo = "Acceso=true";
            var QueConLoQueTraje = function (datos) {
                $("#detodo").html(datos);
                $("#forRegCliente").validate({
                    rules: {
                        CC: {
                            required: true,
                            maxlength: 15,
                            digits: true
                        },
                        nombre: {
                            required: true,
                            maxlength: 70,
                            texto: true
                        },
                        correo: {
                            required: true,
                            email: true,
                            maxlength: 70
                        },
                        correo1: {
                            equalTo: "#correo"
                        }
                    },
                    messages: {
                        CC: {
                            digits: "hussppp! Deben ser solo numeros"
                        }
                    },
                    submitHandler: function () {
                        var url = "Controller/Cliente/CrearCliente.php";
                        var parametros = $("#forRegCliente").serialize();
                        var metodo = function (datos) {
                            alert(datos);
                            datos = $.parseJSON(datos);
                            if (datos.success == "ok") {
                                alerPos("Confirmación", "<b>El cliente fue registrado en la BD</b>");
                                $("#limpiar").trigger("click");
                            } else {
                                alerNeg("Error #2220", "Huusffff.....<br><br>El cliente No fue creado.<br>Intenete de nuevo o verifique que el cleinte puede ser que ya exista!!!.");
                            }
                        };
                        f_ajax(url, parametros, metodo);
                    }
                });
            };
            f_ajax(AdondeVoy, QueLLevo, QueConLoQueTraje);
        });

        $("#ListaCliente").click(function () {
            var url = "view/Clientes/ListarCliente.php";
            var parametros = "Acceso=true";
            var promesa = function (datos) {
                $("#detodo").html(datos);
                $(".EliCli").click(function () {
                    EliClienteID = $(this).attr("codCliente");
                    var promesa = function () {
                        var url = "Controller/Cliente/EliCliente.php";
                        var parametros = "id=" + EliClienteID;
                        var metodo = function (datos) {
                            console.log(datos);
                            datos = $.parseJSON(datos);
                            if (datos.success == "ok") {
                                alerPos("Informe", "El cliente fue eliminado");
                                $("#Cliente" + EliClienteID).remove();
                            } else {
                                alerPos("Error #24", "El cliente NO fue eliminado<br> Puede ser que tenga facturas asignadas");

                            }
                            EliClienteID = null;
                        };
                        f_ajax(url, parametros, metodo);
                    };
                    alertaConf("Dato elimianr", "Esta seguro de eliminar al cliente", promesa);
                });
            };
            f_ajax(url, parametros, promesa);
        });

        $("#BuscarCliente").click(function () {
            var url = "view/Clientes/BusCliente.php";
            var parametros = "accesoo=true";
            var promesa = function (datos) {
                $("#detodo").html(datos);

                $("#BuscarPer").validate({
                    rules: {
                        cedula: {
                            required: true,
                            digits: true
                        }
                    },
                    messages: {
                        cedula: {
                            required: "Para bsucar debe ingresar una cedula",
                            digits: "Debebser en numeros sin comas ni puntos"
                        }
                    },
                    submitHandler: function () {
                        $("#limpiar").trigger("click");
                        $("#panelResul").fadeOut();
                        var url = "Controller/Cliente/BuscarCliente.php";
                        var parametros = $("#BuscarPer").serialize();
                        var promesa = function (datos) {
                            console.log(datos);
                            datos = $.parseJSON(datos);
                            if (datos.success == "ok") {
                                $("#panelResul").fadeIn();
                                $("#CC").val(datos.cc);
                                $("#nombre").val(datos.nom);
                                $("#dir").val(datos.dire);
                                $("#tel").val(datos.tel);
                                $("#correo").val(datos.cor);
                                $("#correo1").val(datos.cor);
                                $("#id").val(datos.id);

                                $("#limpiar").click(function () {
                                    $("#panelResul").fadeOut();
                                });

                                $("#forRegCliente").validate({
                                    rules:{
                                        id:{
                                            required: true,
                                            digits: true
                                        },
                                        CC: {
                                            required: true,
                                            maxlength: 15,
                                            digits: true
                                        },
                                        nombre: {
                                            required: true,
                                            maxlength: 70,
                                            texto: true
                                        },
                                        correo: {
                                            required: true,
                                            email: true,
                                            maxlength: 70
                                        },
                                        correo1: {
                                            equalTo: "#correo"
                                        }
                                    },
                                    submitHandler:function(){
                                        var url ="Controller/Cliente/ModiCliente.php";
                                        var parametros = $("#forRegCliente").serialize();
                                        var promesa = function(datos){
                                            console.log(datos);
                                            datos=$.parseJSON(datos);
                                            if(datos.success=="ok"){
                                                alerPos("Confirmación:","Los datos del cliente fueron Modificados");
                                            }else{
                                                alerNeg("Error #24","<b>No</b> fueron modificados los datos del cliente.")
                                            }
                                        };
                                        f_ajax(url,parametros,promesa);
                                    }
                                });



                            } else {
                                alerNeg("Respuesta servidor:", "NO existe cliente con esta Cédula");
                            }
                        };
                        f_ajax(url, parametros, promesa);
                    }
                });


            };
            f_ajax(url, parametros, promesa);
        });
    }


    function ale(titulo, men) {
        $("#dialog-message").attr("title", titulo);
        $("#menAlerta").html(men);
        $("#dialog-message").dialog({
            modal: true,
            buttons: {
                Cerrar: function () {
                    $(this).dialog("close");
                }
            }
        });
    }

    function alerPos(titulo, men) {
        $("#menAlerta").removeClass("negativo");
        $("#menAlerta").addClass("positivo");
        ale(titulo, men);
    }
    function alerNeg(titulo, men) {
        $("#menAlerta").removeClass("positivo");
        $("#menAlerta").addClass("negativo");
        ale(titulo, men);
    }
    function alerta(titulo, men) {
        $("#menAlerta").removeClass("positivo");
        $("#menAlerta").removeClass("negativo");
        ale(titulo, men);
    }

    function alertaConf(titulo, Mensaje, promesa) {
        $("#dialog-confirm").attr("title", titulo);
        $("#MsnConf").html(Mensaje);
        $("#dialog-confirm").dialog({
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            buttons: {
                Confirmo: function () {
                    promesa();
                    $(this).dialog("close");
                },
                Cancel: function () {
                    $(this).dialog("close");
                }
            }
        });
    }


    $("#ViPedidos").click(function () {
        alerPos("Funciona", "El evento de mostrar la alerta");
    });

});