<?php 

if(isset($_POST["btncalcular"])){


    sleep(2);

 require_once 'logica/Salud.php';
 require_once 'logica/Pension.php';
 require_once 'logica/Caja.php';
 require_once 'logica/Salario.php';

 //recuperar valores del formulario
 $cantidadHoras = $_POST["txthorastrabajadas"];
 $valorHora = $_POST["txtcostohoratrabajo"];

 //instanciar clases hijas
 $objSalario = new Salario($cantidadHoras, $valorHora);
 $objSalud = new Salud($cantidadHoras, $valorHora);
 $objPension =  new Pension($cantidadHoras, $valorHora);
 $objCaja = new Caja($cantidadHoras, $valorHora);




//Llenar atributos por cada instancia
//$objSalario->setCantidadHoras($cantidadHoras);
//$objSalario->setValorHora($valorHora);

echo "<b>El salario bruto es: </b> " . $objSalario-> calcularSalarioBruto() . "<br><br>";


if($objSalario-> calcularSalarioBruto() <= 1000000 ){

    //$objSalud->setCantidadHoras($cantidadHoras);
    //$objSalud->setValorHora($valorHora); 
    echo "<b>Descuento de salud es: </b> " . $objSalud->calcularSalud(0.02) . "<br><br>";

    //$objPension->setCantidadHoras($cantidadHoras);
    //$objPension->setValorHora($valorHora); 
    echo "<b>Descuento de pension es: </b> " . $objPension->calcularPension(0.04) . "<br><br>";
     
    $incremento =  $objSalario-> calcularSalarioBruto() * 0.03;
    $salariofinal =(($objSalario-> calcularSalarioBruto() + $incremento) -  $objSalud->calcularSalud(0.02)- $objPension->calcularPension(0.04));
    echo "<b>El salario a pagar es: </b> " . $salariofinal ."<br>";

    


 }elseif($objSalario-> calcularSalarioBruto() > 1000000 && $objSalario-> calcularSalarioBruto()<= 2000000){


    //$objSalud->setCantidadHoras($cantidadHoras);
   //$objSalud->setValorHora($valorHora); 
    echo "<b>Descuento de salud es: </b> " . $objSalud->calcularSalud(0.04) . "<br><br>";

    //$objPension->setCantidadHoras($cantidadHoras);
    //$objPension->setValorHora($valorHora); 
    echo "<b>Descuento de pension es: </b> " . $objPension->calcularPension(0.06) . "<br><br>";

    //$objCaja->setCantidadHoras($cantidadHoras);
   // $objCaja->setValorHora($valorHora); 
    echo "<b>Descuento de Caja de Compensacion es: </b> " . $objCaja->calcularCaja(0.02) . "<br><br>";

    $salariofinal =(($objSalario-> calcularSalarioBruto()) -  $objSalud->calcularSalud(0.04) - $objPension->calcularPension(0.06)- $objCaja->calcularCaja(0.02));
    echo "<b>El salario a pagar es: </b> " . $salariofinal ."<br>";

 }elseif($objSalario-> calcularSalarioBruto() > 2000000){

    //$objSalud->setCantidadHoras($cantidadHoras);
    //$objSalud->setValorHora($valorHora); 
    echo "<b>Descuento de salud es: </b> <br>" . $objSalud->calcularSalud(0.05). "<br><br>";

    //$objPension->setCantidadHoras($cantidadHoras);
    //$objPension->setValorHora($valorHora); 
    echo "<b>Descuento de pension es: </b><br> " . $objPension->calcularPension(0.07) . "<br><br>";

    //$objCaja->setCantidadHoras($cantidadHoras);
    //$objCaja->setValorHora($valorHora); 
    echo "<b>Descuento de Caja de Compensacion es: </b><br> " . $objCaja->calcularCaja(0.03). "<br><br>";
     
    $salariofinal =(($objSalario-> calcularSalarioBruto()) -  $objSalud->calcularSalud(0.05) - $objPension->calcularPension(0.07)- $objCaja->calcularCaja(0.03));
    echo "<b>El salario a pagar es: </b>" . $salariofinal ."<br>";
 }

}else{
    echo "estas hackeando mi sistema, vamos a llamar a al policia de Internet";
}

?>

