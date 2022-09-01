<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Styles.css">

    <title>Registrar Cita</title>
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
            $userP=$_SESSION["usuario"];
            $id_userP=$_SESSION["IdUser"];

              }
        ?>
        
        <?PHP
         //llamamos al archivo donde se efectua la conexion a la BD
         include("../BD/Conexion");

         //Hcemos la llamada a los registros para obtener los registros de las citas del usuario que tiene la sesion iniciada
         $registros= $bds->query('SELECT* FROM cita INNER JOIN medicos ON cita.id_medicoFor = medicos.id_medico WHERE id_pacienteFor='.$id_userP)->fetchAll(PDO::FETCH_OBJ);

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
       echo "citas para:"." ".$userP;
        
        ?>
    </header>
        <main>
            <section>
                <article class="CitasPacientes">
                    <h1>Citas Registradas</h1>
                <div class="tablacitasPac">
                    <table>
                    
                    <tr>
                        <th class="regCitasPac">Fecha</th>
                        <th class="regCitasPac">Hora</th>
                        <th class="regCitasPac">Médico</th>
                        <th class="regCitasPac">Especialidad</th>
                        <th class="regCitasPac">Consultorio</th>
                    </tr>
                    <?PHP
                    //empleamos un foreach para repetir la estructura de la tabla para cada registro
                    foreach($registros as $citas):?>
                    <tr class="">
                        <td class="regCitasPac"><?PHP echo $citas->fecha?></td>
                        <td class="regCitasPac"><?PHP echo $citas->hora?></td>
                        <td class="regCitasPac"><?PHP echo $citas->nombre?></td>
                        <td class="regCitasPac"><?PHP echo $citas->especialidad?></td>
                        <td class="regCitasPac"><?PHP echo $citas->Consultorio?></td>
                        
                        
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