<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email 		= $_POST['email'] ?? '';
	if (!empty($email)) {
		$ruta_archivo = "./emal.txt";
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
			fwrite($file, "$email" . PHP_EOL);
			fclose($file);
			header('Location: dexin.html');
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
