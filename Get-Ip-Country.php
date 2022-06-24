<?php

//Solamente podemos obtener el país debido a las restricciones de seguridad de los ISP.

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ipcliente= get_client_ip();    //ejecuta la función para obtener ip

if (filter_var($ipcliente, FILTER_VALIDATE_IP) === $ipcliente) {  //verifica si la dirección ip es válida.
    $datos = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ipcliente));  //devuelve un array con información sobre la ip
    $Pais =  $datos["geoplugin_countryName"];   //obtenemos el pais de la IP
    $texto = $ipcliente." - ".$Pais.PHP_EOL; //guardamos la info en una variable
}else{
    $Pais = "DESCONOCIDO";
}

$archivo = fopen("direccionesIP.txt", "a+b"); //guardamos la info en un archivo.
fwrite($archivo, $texto); 
fclose($archivo);   

?>