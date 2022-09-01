
 <?PHP
        //se inicia o se reanuda la sesion cualquiera de las 2 posibilidades
        session_start();

        //validamos si no hay nada almacenado informacion en la variable global SESSION
        if(!isset($_SESSION["usuario"])){
                header("Location:../logeo.php");
                

        }else{
            $userM= $_SESSION["usuario"];
        }
        
        ?>


<?PHP
//evaluamos si  
if(isset($_GET["btnUpdate"])){

    header("Location:index.php");
    
    

}else{
    $IdCita= $_GET["id"];
   

}
?>


<?PHP
        /*Validamos si se ha pulsado el boton de logeo
if(isset( $_POST["RegistrarCita"])){
    
    //recuperamos variables globales y las almacenamos en variables locales
    $fecha= $_POST["dateCita"];
    $hora= $_POST["timeCita"];
    $idPac= $_POST["idPaciente"];

    //llamamos al metodo para hacer el registro
    registrarCita($fecha, $hora, $idPac, $idMed);

}*/

?>
        



<!-- ************** -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Styles.css">

    <title>Actualizar Cita</title>
</head>
<body>


<!-- creamos la navegacion de la pagina-->
    <header>
        <nav>
            <ul class="Menu">
                <li class="elemenu"><a href="index.php">Inicio</a></li>
                
                <li class="elemenu"><a href="">opción</a></li>
                
                <li class="elemenu"><a href="../SessionClose.php"> Cerrar Sesion</a></li>
            </ul>
            
        </nav>

    </header>
                <!-- Mostramos el nombre del usuario que tiene iniciada la sesion. -->
                <?PHP
                // mostramos el nombre de nuestro usuario con la variable recuperada anteriormente
                echo "Usuario:"." ".$userM;
                ?>
        <main>
            <section>
                <article>
                    <h1>Actuliza Datos</h1>
                    <!-- Formulario para hacer el registro, usamos super global $_SERVER['PHP_SELF'] para trabajar en esta misma pagina-->
                    <form action="updateCitaBD.php" method="POST" class="EstiloForm">
                    <!-- Dato de tipo fecha -->
                    <label for="dateCita">Fecha: </label>
                    <input type="date" name="dateCita">
                    <!--dato de tipo time -->
                    <label for="timeCita">Hora: </label>
                    <input type="time" name="timeCita"> <br>
                    <br>
                    <br>
                    <!-- Mostramos el nombre del paciente seleccionado-->
                    <?PHP
                                //llamamos al archivo donde se efectua la conexion a la BD
                                include("../BD/Conexion");

                                //hacemos una consulta con alias para poder diferenciar las tablas 
                                $registros= $bds->query('SELECT pacientes.nombre AS nombrePac, pacientes.apellidoPaterno AS apePaPa, pacientes.apellidoMaterno AS apeMa
                                FROM cita INNER JOIN pacientes ON cita.id_pacienteFor = pacientes.Id_Paciente WHERE cita.id_cita='.$IdCita)->fetchAll(PDO::FETCH_OBJ);
                            ?>
                    <?PHP
                     foreach($registros as $citas){

                     }
                    
                    ?>
                    <!-- menu de seleccion -->
                    <label for="idPacient">ID Cita:</label>
                     
                    <input type="text" name="idPacient" value="<?PHP echo  $IdCita;?>" readonly> </input>


                    <!-- menu de seleccion -->
                    <label for="DatosPaciente">Paciente:</label>
                     
                    <input type="text" name="DatosPaciente" value="<?PHP echo $citas->nombrePac ?>" readonly> </input>
                    <br>
                    <br>
                    <input type="button" onclick="location.href='index.php';" value="CANCELAR" />

                    <input type="submit" value="Actualizar" name="updateCita" class="btnform">
                    
                    </form>
                   
                </article>
            </section>
        </main>
        <aside></aside>
        <footer></footer>

        
    
</body>
</html>