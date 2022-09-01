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
        
        
        //se inicia o se reanuda la sesion cualquiera de las 2 posibilidades
        session_start();

        //validamos si no hay nada almacenado informacion en la variable global SESSION
        if(!isset($_SESSION["usuario"])){
                header("Location:../logeo.php");
                

        }else{
            //se inicia o se reanuda la sesion cualquiera de las 2 posibilidades
            //session_start();
            //recuperamos variables globales las almacenamos en locales para uso en este ambito
            $userM=$_SESSION["usuario"];
            $idMed= $_SESSION["IdUser"];
               }

        ?>
        <?PHP
                    //Validamos si se ha pulsado el boton de logeo
            if(isset( $_POST["RegistrarCita"])){
                
                //recuperamos variables globales y las almacenamos en variables locales
                $fecha= $_POST["dateCita"];
                $hora= $_POST["timeCita"];
                $idPac= $_POST["idPaciente"];

                //llamamos al metodo para hacer el registro
                registrarCita($fecha, $hora, $idPac, $idMed);

            }
        
        ?>
        <?PHP
        function registrarCita($fecha, $hora, $idPac, $idMed){
            
                    
                try{
        
                    //llamamos al archivo donde se efectua la conexion a la BD
                    include("../BD/Conexion");
                
                    //creamos la sentencia SQL INSERT empleamos marcadores con el fin de evitar inyecciones SQL 
                    $sql= "INSERT INTO cita (fecha, hora, id_pacienteFor, id_medicoFor) VALUES (:m_fecha, :m_hora, :m_idPac, :m_idMed)";
                    
                    //hacemos uso de la sentencia preparada de nuestro objeto de conexion y le pasamos la sentencia sql
                    $resultado= $bds->prepare($sql);
                
                    //ahora se ejecuta la sentencia, debemos sustituir los marcadores por las variables que contiene la informacion que el usuario ingreso
                    $resultado->execute(array(":m_fecha"=>$fecha , ":m_hora"=>$hora, ":m_idPac"=>$idPac, ":m_idMed"=>$idMed));
                
                    //mostramos mensaje de registro exitoso
                    echo "Cita registrada Correctamente!!";
                
                    //liberamos la memoria para no consumirn recursos de manera innecesaria
                    $resultado->closeCursor();
                
                    //capturamos el error en caso de fallar la conexion
                    }catch(Exception $e){
                
                
                        //indicamos que nos muestre la linea de error
                        echo "Error en" . $e->getLine();
                
                    }
            

        }
        
        ?>

       

<!-- creamos la navegacion de la pagina-->
    <header>
        <nav>
            <ul class="Menu">
                <li class="elemenu"><a href="index.php">Inicio</a></li>
                
                <li class="elemenu"><a href="">opción</a></li>
                <li class="elemenu"><a href="">opción</a></li>
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
                    <h1>Registrar Cita</h1>
                    <!-- Formulario para hacer el registro, usamos super global $_SERVER['PHP_SELF'] para trabajar en esta misma pagina-->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="EstiloForm">
                    <!-- Dato de tipo fecha -->
                    <label for="dateCita">Fecha: </label>
                    <input type="date" name="dateCita">
                    <!--dato de tipo time -->
                    <label for="timeCita">Hora: </label>
                    <input type="time" name="timeCita"> <br>
                    <br>
                    <br>
                    <!-- menu de seleccion -->
                    <label for="idPaciente">Paciente:</label>
                     
                    <select name='idPaciente'>
                        <option selected>Paciente</option>
                            <!--incluimos el archivo que tiene la conexion a la BD -->
                            <?php
                                include("../BD/Conexion");
                                //almacenamos en variable $sql la consulta para extraer a los pacientes registrados 
                                $registros= $bds->query('SELECT Id_Paciente, nombre, apellidoPaterno, apellidoMaterno FROM pacientes')->fetchAll(PDO::FETCH_OBJ);

                            ?>
                            <?PHP
                            //empleamos un foreach para repetir la estructura de la tabla para cada registro
                            foreach($registros as $citas):?>
                            <!-- IMportante poner echo de lo contrario no se guardan en el form y no se envia en el post -->
                    <option value="<?PHP echo $citas->Id_Paciente?>"><?PHP  echo $citas->nombre?></option>

                    
                    
                        <?PHP
                        //cerramos el bucle
                        endforeach; 
                        
                        ?>                 
  
                    </select>
                    <br>
                    <br>
                    <input type="button" onclick="location.href='index.php';" value="CANCELAR" />

                    <input type="submit" value="REGISTRAR" name="RegistrarCita" class="btnform">
                    
                    </form>
                    <?PHP 
                        function regCitaP($idPac){
                            echo $idPac;

                        }
        
                    ?>
                    


                </article>
            </section>
        </main>
        <aside></aside>
        <footer></footer>

        
    
</body>
</html>