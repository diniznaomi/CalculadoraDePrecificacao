<?php

print_r(
    'primeiramente iremos cadastrar os INGREDIENTES usados na receita...' .
        PHP_EOL
);
$exit = false;

while ($exit == false) {
    $ingredient = readstring('Digite o nome do ingrediente: '. PHP_EOL);
    $totalamount = readInteger(
        'quantidade comprada de ' . $ingredient. '?'. PHP_EOL. 'OBS: (EM GRAMAS, MILILITROS OU UNIDADES)'. PHP_EOL
    );
    $totalcost = readFloat('quanto custou este ingrediente?'. PHP_EOL);

    $amountused = readInteger(
        'quantidade que voce usará na receita? '. PHP_EOL. 'OBS: (EM GRAMAS, MILILITROS OU UNIDADES)'
    );

    $test = readstring('Há mais algum ingrediente? Escreva SIM ou NAO: ');

    $sql = "INSERT INTO $productname (ingredient, totalamount, totalcost, amountused) values ('$ingredient', $totalamount, '$totalcost', $amountused);";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        if ($test == 'NAO') {
            $exit = true;
        }
    } else {
        print_r('Ocorreu erro na conexao ' . mysqli_error($connection));
    }
}
//EXIBIR TABELA DE INGREDIENTES
$sql = "select * from $productname;";
$consulta = mysqli_query($connection, $sql);

if ($consulta) {
    print_r( PHP_EOL);
    print_r('## TABELA DE INGREDIENTES -> '.$productname.' ## '.PHP_EOL);
    print_r(PHP_EOL);

    $data = mysqli_fetch_all($consulta);
    foreach ($data as $row) {
        print_r('ingrediente: ' . $row[1] . PHP_EOL);
        print_r('quantidade comprada: ' . $row[2] . PHP_EOL);
        print_r('preço: ' . $row[3] . PHP_EOL);
        print_r('---------------------------------' . PHP_EOL);
    }

} else {
    print_r('Ocorreu um erro: ' . mysqli_error($connection));
}
