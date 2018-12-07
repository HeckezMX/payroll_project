<?php
function obtenerDatosEmpresa ($empresa) {
    $Usuario="root";
    $Password="20edo18";
    $Servidor="localhost:3306";
    $BaseDeDatos="onenom";

    $db_xion = mysqli_connect($Servidor,$Usuario,$Password,$BaseDeDatos) or die("Error: El SERVIDOR no puede conectar con la base de datos");
    $query = "SELECT * FROM clientes WHERE idcliente = ".$empresa;
    $query_exec = mysqli_query($db_xion, $query);
    $row=mysqli_fetch_array($query_exec);
    $cfdiFiscal = [
        "rfc" => $row['rfc'],
        "razonSocial" => $row['razonSocial'],
        "domicilio" => $row['domicilio'],
        "codigoPostal" => $row['codigoPostal'],
        "registroPatronal" => $row['registroPatronal']
    ];
    $cfdiAsimilados = [
        "rfc" => $row['rfcA'],
        "razonSocial" => $row['razonSocialA'],
        "domicilio" => $row['domicilioA'],
        "codigoPostal" => $row['cpA'],
        "registroPatronal" => $row['registroPatronal']
    ];
    $cfdiPPP = [
        "rfc" => $row['rfcPPP'],
        "razonSocial" => $row['razonSocialPPP'],
        "domicilio" => $row['domicilioPPP'],
        "codigoPostal" => $row['cpPPP'],
        "registroPatronal" => $row['registroPatronal']
    ];
    

    $responseFinal['cfdiFiscal'] = $cfdiFiscal;
    $responseFinal['cfdiAsimilados'] = $cfdiAsimilados;
    $responseFinal['cfdiPPP'] = $cfdiPPP;

    return json_encode($responseFinal);
}