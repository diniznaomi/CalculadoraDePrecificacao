<?php

//ADICIONANDO TABELA DE PREÇO DE CUSTO
$sql= (
    "CREATE TABLE costprice (
        id_produto INTEGER AUTO_INCREMENT,
        price FLOAT (10,2)
        );"
    );
    $result = mysqli_query($connection, $sql);
    if($result){
        print_r('CRIADA TABELA PRECO DE CUSTO');
    }else{
        print_r('erro conexao'.mysqli_error($connection));
    }

//CALCULANDO PREÇO DE CUSTO DE CADA INGREDIENTE

$sql= ("select * from $productname");
$select = mysqli_query($connection, $sql);

if($select){

$array = mysqli_fetch_all($select);

foreach ($array as $row){
    $costprice = (($row[3]/$row[2]) * $row[4]); //CALCULANDO
    print_r("O preco de custo de ".$row[1]." nesta receita eh: ". $costprice . PHP_EOL); //EXIBINDO O PREÇO DE CUSTO

    $sql = ("INSERT INTO costprice (price) values ('$costprice');");
    $inserir = mysqli_query($connection, $sql);

    if($inserir){
        print_r("ok");
    }else{
        print_r('ocorreu erro conexao'.mysqli_error($connection));
    }
}


//ATIBUINDO VALOR DE PREÇO DE CUSTO






/*
$totalcost = 0;

foeach($array as $row => $value){
    $totalcost= $total + $value;
}
print_r('custo total da sua receita eh de: ' .$totalcost)
*/

}else {
    print_r('Ocorre erro na conexao' . mysqli_error($connection));
}

print_r("Qual eh a margem de lucro que voce que ter por unidade de ". $productname. "?" .PHP_EOL);
$profit = stream_get_line(STDIN, 1024, PHP_EOL);
