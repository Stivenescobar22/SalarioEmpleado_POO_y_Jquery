<!DOCTYPE HTML>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset= utf-8">
    <title>programa salario</title>

 </head>

 <body>

   <h1>Ejercicio POO herencia basica 2 en php y jquery</h1>
   <h3>
    programa que calcula el salario de un empleado
    con sus respectivas deducciones.
   </h3>

   <form name="form1" method="POST" action="calcular.php">

     <p>Cantidad de horas trabajadas

        <input type="text" name="txthorastrabajadas">
     </p> 

     <p>Costo de la hora trabajada

        <input type="text" name="txtcostohoratrabajo">
     </p> 
     <p><input type="submit" name="btncalcular" value="Calcular"></p>
     
   </form>
   <script src="js/jquery-3.4.1.js"></script>


 </body>


</html>