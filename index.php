<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta charset="UTF-8">
        <title>Sistema de información de ventas</title>
        <link href="CSS/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/jquery-ui.structure.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/MiEstilo.css" rel="stylesheet" type="text/css"/>
        <script src="JS/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="JS/jquery-ui.js" type="text/javascript"></script>
        <script src="JS/jquery.validate.js" type="text/javascript"></script>
        <script src="JS/additional-methods.js" type="text/javascript"></script>
        <script src="JS/localization/messages_es.js" type="text/javascript"></script>
        <script src="JS/MILogica.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="container">
            <header>
                <div id="enca">
                    Sistema de información
                </div>
            </header>
            <section>
                <div id="contec">
                    <div id="menu">
                        <h2 style="font-family: 'LaFea'; ">Menu</h2>
                        <ul>
                            <li class="btn btn-sucess" id="ViProveedor">Proveedor</li>
                            <li class="btn btn-warning" id='ViCliente'>Cliente</li>
                            <li class="btn btn-warning" id="ViProducto">Producto</li>
                            <li class="btn btn-sucess" id="ViPedidos">Pedidos</li>
                        </ul>
                    </div>
                    <div id="contenido">
                        <center>
                            Sistema de informacion de ventas de productos a clientes
                        </center>
                        <center>
                            <img src="img/logo.png" alt=" Info" width="50%"/>
                            <br>
                            <div style="text-align: left; padding: 3%;">
                                <p>
                                    $.validator.addMethod("texto", function(value, element) {<br>
                                    return /^[ a-záéíóúüñ]*$/i.test(value);<br>
                                    }, "Ingrese sólo letras, números o espacios.");
                                </p>
                                <p>
                                    <a href="Flas05.zip"><button>Descargar Copia</button></a>
                                </p>
                                <p>
                                    <a href="CLASS/BD.zip"><button>Acceso BD</button></a>
                                </p>
                                <p>
                                    <a href="Copiacol05.sql"><button>Script BD</button></a>
                                </p>
                            </div>
                        </center>                      
                    </div>
                </div>
            </section>
            <footer>
                <div id="pie">

                </div>
            </footer>
        </div>
        <div style="display: none;">
            <div id="dialog-message" title="">
                <p id="menAlerta"></p>
            </div>
            <div id="dialog-confirm" title="">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span><span id="MsnConf"></span></p>
            </div>
        </div>
    </body>
</html>
