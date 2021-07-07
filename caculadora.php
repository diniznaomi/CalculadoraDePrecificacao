<?php

include 'functions.php';
include 'connect-database.php';

print_r('*******************************'. PHP_EOL);
print_r('* CALCULADORA DE PRECIFICACAO *'. PHP_EOL);
print_r('*******************************'. PHP_EOL);

//REGISTRANDO INGREDIENTES
$productname = readstring('Escreva aqui o nome que voce dara ao produto: ');
$sql = "CREATE TABLE $productname (
            id INTEGER AUTO_INCREMENT PRIMARY KEY,
            ingredient VARCHAR(255),
            totalamount INTEGER,
            totalcost FLOAT (10,2),
            amountused INTEGER
            );";
$resultado = mysqli_query($connection, $sql);

if ($resultado) {
    include 'ingredients.php';
} else {
    print_r('Ocorre erro na conexao' . mysqli_error($connection));
}


include 'price.php';

