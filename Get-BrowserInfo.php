<?php

$navegador = get_browser(null, true); //devuelve un array
print_r($navegador); //muestra todo el contenido del array
echo $navegador['parent']; //muestra el navegador y la versión.

$archivo = fopen("direccionesIP.txt", "a+b"); //guardamos la info en un archivo.
fwrite($archivo,"Información de navegador: ".$navegador['parent']." - ".$navegador['platform_description'].PHP_EOL); 
fclose($archivo);  

?>