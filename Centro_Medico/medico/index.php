<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Medico Sesai</title>
    <link rel="stylesheet" href="../CSS/Styles.css">
    <link rel="stylesheet" href="CSS/Normalize.css">
</head>
<body>
        <?PHP
        //se inicia o se reanuda la sesion cualquiera de las 2 posibilidades
        session_start();

        //validamos si no hay nada almacenado informacion en la variable global SESSION
        if(!isset($_SESSION["usuario"])){
                header("Location:../logeo.php");
                

        }
        
        ?>
        
        <!-- <h1><div class="titulo1">Centro Medico JS</div></h1>-->
        <h1>Centro Medico JS</h1>

        
    <header>
        <nav>
            <ul class="Menu">
                
                <li class="elemenu"><a href="regCitaM.php">Registrar cita</a></li>
                <li class="elemenu"><a href="consultarCitaM.php">Consultar cita</a></li>
                <li class="elemenu"><a href="modCita.php">Modificar cita</a></li>
                <li class="elemenu"><a href="delCita.php">Eliminar cita</a></li>
                <li class="elemenu"><a href="../SessionClose.php">Salir</a></li>
            </ul>
            
        </nav>

    </header>
    <main>
        <section>
            <article>
            <?PHP  echo "Bienvenido"." ". $_SESSION["usuario"] . "<br>";?>
               <!-- <h1><div class="titulo1">Centro Medico JS</div></h1>-->
               <h2>Portal Medicos</h2>

            </article>
        </section>
    </main>
    <aside></aside>
    <footer class="piepag"></footer>
    
    
</body>
</html>