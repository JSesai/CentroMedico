<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Styles.css">

    <title>Consultar Cita</title>
</head>
<body>
        <?PHP
            
            //validamos si no hay nada almacenado informacion en la variable global SESSION
            if(isset($_SESSION["usuario"])){
                    header("Location:../logeo.php");
              }else{
                //se inicia o se reanuda la sesion cualquiera de las 2 posibilidades
            session_start();
            //recuperamos variables globales las almacenamos en locales para uso en este ambito
            $userM=$_SESSION["usuario"];
            $idMed= $_SESSION["IdUser"];
           

              }
        ?>
        
        <?PHP
         //llamamos al archivo donde se efectua la conexion a la BD
         include("../BD/Conexion");

         //hacemos una consulta con alias para poder diferenciar las tablas 
           $registros= $bds->query('SELECT cita.id_cita, medicos.nombre AS nomMed, medicos.apellidoPaterno AS apePaMed,medicos.apellidoMaterno As apeMaMed, cita.fecha, cita.hora, pacientes.nombre AS nombrePac, pacientes.apellidoPaterno AS apePaPa
           FROM cita INNER JOIN medicos ON cita.id_medicoFor = medicos.id_medico INNER JOIN pacientes ON cita.id_pacienteFor = pacientes.Id_Paciente WHERE cita.id_medicoFor='.$idMed)->fetchAll(PDO::FETCH_OBJ);
        ?>

<!-- creamos la navegacion de la pagina-->
    <header>
        <nav>
            <ul class="Menu">
                <li class="elemenu"><a href="index.php">Inicio</a></li>
                <li class="elemenu"><a href="regCitaM.php"></a></li>
                <li class="elemenu"><a href="">opción</a></li>
                <li class="elemenu"><a href="">opción</a></li>
                <li class="elemenu"><a href="">opción</a></li>
                <li class="elemenu"><a href="../SessionClose.php"> Cerrar Sesión</a></li>
            </ul>
            
        </nav>
<!-- Mostramos el nombre del usuario que tiene iniciada la sesion. -->
    <?PHP
       // mostramos el nombre de nuestro usuario con la variable recuperada anteriormente
       echo $userM.". Estas son tus citas.";
       
        
        ?>
    </header>
        <main>
            <section>
                <article class="CitasPacientes">
                    <h1>Citas Registradas</h1>
                <div class="tablacitasPac">
                    <table>
                    
                    <tr>
                        <!-- cabeceras de la tabla  -->
                        <th class="regCitasPac">Id Cita</th>
                        <th class="regCitasPac">Médico</th>
                        <th class="regCitasPac">Fecha</th>
                        <th class="regCitasPac">Hora</th>
                        <th class="regCitasPac">Paciente</th>
                        <th class="regCitasPac">Acción</th>
                    </tr>

                    <!-- Indicamos campo para PHP  -->
                    <?PHP
                    //empleamos un foreach para repetir la estructura de la tabla para cada registro y mostrarlos en pantalla
                    foreach($registros as $citas):?>
                    <tr class="">
                        <!--mostramos registro id_cita en la tabla  -->
                        <td class="regCitasPac"><?PHP echo $citas->id_cita ?></td>
                        <!-- mostramos nombre del medico con el uso del alias -->
                        <td class="regCitasPac"><?PHP echo $citas-> nomMed, $citas->apePaMed, $citas->apeMaMed?></td>
                        <!-- mostramos la fecha de la cita-->
                        <td class="regCitasPac"><?PHP echo $citas->fecha?></td>
                        <!-- mostramos la hora de la cita -->
                        <td class="regCitasPac"><?PHP echo $citas->hora?></td>
                        <!-- mostramos el nombre del paciente y apellido con la ayuda de los alias incluidos en la consulta SELECT-->
                        <td class="regCitasPac"><?PHP echo $citas->nombrePac, $citas->apePaPa?></td>
                        <!-- Agregamos boton para eliminar  -->
                        <td class="regCitasPac"><a href="prueba.php?id=<?PHP echo $citas->id_cita?>"><input type="button" name="btndel" value="Eliminar" class="regCitasPac" ></a></td>
                                                
                        
                    </tr>
                    <?PHP
                    //cerramos el bucle
                    endforeach; 
                    
                    ?>
                    </table>
                </div>


                </article>
            </section>
        </main>
        <aside></aside>
        <footer></footer>

        
    
</body>
</html>