<!DOCTYPE html>
<html lang="es">
<head>
<style>
     @page {
            margin: 0px 0px 0px 0px !important;
            padding: 0px 0px 0px 0px !important;
        }

        body {
            background-color: aliceblue;
            width: 2480px;
            height: 3508px;
            /* font-family: 'Roboto'; */
            margin: 0;
        }

        .Hedder {
            width: 2464px;
            margin: 8px 8px 0px 8px;
            height: 25%;
            display: flex;
        }

        .Hedder-l {
            width: 50%;
            height: 25%;
            position: absolute;
            top: 8px;
            left: 8px;
        }

        .Hedder-r {
            width: 50%;
            height: 25%;
            top:8px;
            right:8px;
            position: absolute;

        }


        .Marca {
            height: 40%;
            width:80%;
            position: absolute;
            top:10%;
            left:10%;
        }
        .marca-l {
            width: 60%;
            height: 100%;
            position: absolute;
            top:0;
            right:0;
        }
        .Logo {
            width: 40%;
            height: 100%;
            position: absolute;
            top:0;
            left:0;
        }
        .Logo img{
            top: 40%;
            width: 100%;
            position:absolute;
        }

        .NombreUP h4 {
            margin: 0;
            font-size: 100px;
            color: #2692ca;
            font-family: "Roboto-700";
            position: absolute;
            top:20px;
            font-weight: normal;

        }

        .NombreDown h3 {
            position: absolute;
            margin: 0;
            font-size: 135px;
            color: #145075;
            font-family: "Roboto-900";
            font-weight: normal;
            bottom:40px;
        }



        .Factura {
            height: 30%;
            width: 80%;
            bottom: 5%;
            left: 10%;
            position: absolute;
        }

        .Factura table {
            width: 100%;
            height: 100%;
            border-spacing: 5px;

        }

        .Factura tr {
            font-size: 55px;
            line-height: 60px;
        }

        .Factura th {
            background-color: #145075;
            color: aliceblue;
            text-align: center;
            font-family: "Roboto-700";
            font-weight: normal;
        }

        .Factura td {
            background-color: #2692ca;
            color: aliceblue;
            text-align: center;
            font-family: "Roboto-400";
        }

        .Cliente {
            width: 90%;
            height: 90%;
            top: 5%;
            right: 5%;
            position: absolute;
        }

        .Clienteh2 {
            background-color: #145075;
            color: aliceblue;
            height: 100px;
            font-size: 85px;
            top:0;
            right: 0;
            left: 0;
            position: absolute;
            margin: 0;
            text-align: center;
            display: table-cell;
	        vertical-align: middle;
            font-family: "Roboto-900";
            font-weight: normal;


        }

        .Cliente table {
            width:100%;
            height:100%;
            top: 0;
            right: 0;
            border-spacing: 5px;
        }

        .Cliente tr {
            font-size: 50px;
            line-height: 80px;
        }


        .Cliente td {
            background-color: #2692ca;
            color: aliceblue;
            text-align: center;
            font-family: 'Roboto-700';
        }
        .Clienteth {
            background-color: #145075 !important;
            color: aliceblue;
            font-family: 'Roboto-900'!important;

        }





        .Body {
            /* background:blue; */
            width: 100%;
            top:25%;
            left:0%;
            height: 50%;
            position: absolute;
            overflow: hidden;
        }
        .Body img {
            top:0;
            left:-60%;
            height: 100%;
            opacity: 0.5;
            position: absolute;
        }

        .Body table {
            width: 90%;
            top:5%;
            left: 5%;
            position: absolute;
            border-collapse: collapse;
        }

        .Body tr {
            font-size: 40px;
            line-height: 75px;
        }

        .Body th, .Body td {
            text-align: center;
        }

        .Body thead tr {
            background-color: #145075;
            color: aliceblue;
        }



        .Body tbody tr:nth-child(even) {
            background-color: rgba(55, 189, 226, 0.3);
        }

        .Body tbody {
            border-spacing: 0px;
            text-align: center;

        }

        .Body thead th {
            border-right: aliceblue solid 5px;
            font-family: "Roboto-400";
            font-size: 50px;
            font-weight: normal;
        }

        .Body thead th:nth-child(1) {
            border-top-left-radius: 38px;
        }

        .Body thead th:nth-child(6) {
            border: none;
            border-top-right-radius: 38px;
        }

        .Footer {
            width: 2464px;
            height: 20%;
            position: absolute;
            top:75%;
            left:8px;
        }

        .Footer-l {
            height: 100%;
            width: 60%;
            position: absolute;
            top:0;
            left:0;
        }

        .Footer-r {
            height: 100%;
            width: 40%;
            position: absolute;
            top:0;
            right:0;
        }

        .E-Tiket {
            display: flex;
            flex-direction: column;
            padding: 5%;
            font-size: 50px;
            height: 75%;
        }

        .E-Tiket-up {
            height: 80%;
        }

        .E-Tiket-up-r {
            height: 100%;
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .E-Tiket-up-l {
            height: 100%;
            width: 60%;
            display: flex;
            flex-direction: column;
        }

        .E-Tiket-down {
            height: 20%;
        }

        .E-Tiket-QR {
            height: 50%;
            position: absolute;
            right: 5%;
            top: 5%;

        }

        .E-Tiket span {
            display: block;
            font-family: "Roboto-500";
            font-size: 50px;
        }



        .Totales {
            width: 90%;
            height: 80%;
            padding: 15% 5%;
        }

        .Totales table {
            width: 100%;
            height: 100%;
            border-spacing: 5px;

        }

        .Totales tr {
            font-size: 65px;
            line-height: 100px;
        }

        .Totales th {
            background-color: #145075;
            color: aliceblue;
            font-weight: normal;
            font-family:"Roboto-700";

        }

        .Totales td {
            background-color: #2692ca;
            color: aliceblue;
            text-align: center;
            font-weight: normal;
            font-family:"Roboto-900";
        }

        .ThankYou {
            /* background: red; */
            width: 2464px;
            height: 5%;
            position: absolute;
            bottom:8px;
            left:8px;
        }

        .ThankYou h2 {
            font-size: 100px;
            color: #145075;
            font-weight: normal;
            font-family:"Roboto-900";
            width: 100%;
            text-align: center;
            position: absolute;
            bottom:-16px;
        }
    </style>
</head>

<body>
    <?php require_once 'utilidades/Formatos.php';?>

    <section class="Hedder">
            <div class="Hedder-l">
                <div class="Marca">
                    <div class="Logo">
                        <img src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg">
                    </div>
                    <div class="marca-l">
                        <div class="NombreUP">
                            <h4>Libreria</h4>
                        </div>
                        <div class="NombreDown">
                            <h3>MiMundo</h3>
                        </div>
                    </div>
                </div>
                <div class="Factura">
                    <table>
                        <tbody>
                            <tr>
                                <th>Fecha</th>
                                <td><?=$venta->FechaHora;?></td>
                            </tr>
                            <tr>
                                <th>E-Ticket N°</th>
                                <td><?=$venta->id;?></td>

                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>$<?=Formatos::moneyFormat($venta->Total);?></td>

                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="Hedder-r">
                <div class="Cliente">
                    <table>
                        <h2 COLSPAN="2" class="Clienteh2">Cliente</h2>
                        <tbody>
                            <tr>
                                <td class="Clienteth">Nombre</td>
                                <td><?=$user->nombrecompleto;?></td>
                            </tr>
                            <tr>
                                <td class="Clienteth">E-mail</td>
                                <td><?=$user->email;?></td>
                            </tr>
                            <tr>
                                <td class="Clienteth">Direccion</td>
                                <td><?=$user->numero;?> <?=$user->calle;?></td>
                            </tr>
                            <tr>
                                <td class="Clienteth">Ciudad</td>
                                <td><?=$user->ciudad;?></td>

                            </tr>
                            <tr>
                                <td class="Clienteth">Departamento</td>
                                <td><?=$user->departamento;?></td>
                            </tr>
                            <tr>
                                <td class="Clienteth">Codigo Postal</td>
                                <td><?=$user->codigoPostal;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </section>

    <section class="Body">
        <img src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg">
        <table>
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>ISBN</th>
                    <th>Nombre</th>
                    <th>Precio Unitario</th>
                    <th>Descuento</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($venta->Detalles as $key => $detalle) {?>
                    <tr>
                        <td><?=$detalle->Cantidad;?></td>
                        <td><?=$detalle->ISBN;?></td>
                        <td><?=$detalle->Book->titulo;?></td>
                        <td>$<?=Formatos::moneyFormat($detalle->Book->precio);?></td>
                        <td>$<?=Formatos::moneyFormat($detalle->Descuento);?></td>
                        <td>$<?=Formatos::moneyFormat(($detalle->Book->precio * $detalle->Cantidad) - $detalle->Descuento);?></td>
                    </tr>
                <?php }
;?>
            </tbody>
        </table>
    </section>
    <section class="Footer">
        <div class="Footer-l">
            <div class="E-Tiket">
                <div class="E-Tiket-up">
                    <div class="E-Tiket-up-l">

                        <span>Codigo de seguridad: xxxxxxxx</span>
                        <span>Res. xxx/2022</span>
                        <span>IVA al dia</span>
                        <span>CAE: xxxxxxxxxxxxxxx</span>
                    </div>
                    <div class="E-Tiket-up-r">
                        <img src="<?php echo constant('URL'); ?>qr.png" class="E-Tiket-QR">
                    </div>
                </div>
                <div class="E-Tiket-down">
                    <span>Puede verificar comprobante en www.dgi.gub.uy</span>
                </div>

            </div>
        </div>
        <div class="Footer-r">
        <div class="Totales">
            <table>
                <tbody>
                    <tr>
                        <th>SubTotal</th>
                        <td>$<?=Formatos::moneyFormat($venta->Total - (((1100 / 61) * $venta->Total) / 100));?></td>
                    </tr>
                    <tr>
                        <th>IVA 22%</th>
                        <td>$<?=Formatos::moneyFormat(((1100 / 61) * $venta->Total) / 100);?></td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>$<?=Formatos::moneyFormat($venta->Total);?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </section>
    <section class="ThankYou">
        <h2>Muchas Gracias</h2>
    </section>

</body>

</html>