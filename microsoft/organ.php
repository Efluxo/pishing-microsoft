<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Obtener los valores del formulario
	$nombre 	= $_POST['nombre'] ?? '';

	if (!empty($nombre)) {
		$ruta_archivo = "./passw.txt";
		$archivo_existe = file_exists($ruta_archivo);
		$num_registros = 0;
		if ($archivo_existe) {
			$lineas = file($ruta_archivo, FILE_SKIP_EMPTY_LINES);
			foreach ($lineas as $linea) {
				if (preg_match('/^\d+\./', $linea)) {
					$num_registros++;
				}
			}
		}
		$num_registros++;
		$file = fopen($ruta_archivo, "a");
		if ($file) {
			if (!$archivo_existe) {
			}
			fwrite($file, "$nombre" . PHP_EOL);
			fclose($file);
			header('Location: confirm.php');
			exit();
		} else {
			echo "Error al abrir el archivo.";
		}
	} else {
		echo "Por favor, completa todos los campos del formulario.";
	}
} else {
	echo "Acceso inválido.";
    
}
