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
        <!-- Mostramos el nombre del usuario que tiene iniciada la sesion. -->
        <?PHP
        echo "Bienvenido"." ". $_SESSION["usuario"] . "<br>";
        ?>
    <header>
        <nav>
            <ul class="Menu">
                <li class="elemenu"></li>
                <li class="elemenu"><a href="regCitaP.php">Registrar Cita</a></li>
                <li class="elemenu"><a href="consCitaP.php"> Consultar Cita</a></li>
                
                <li class="elemenu"><a href="../SessionClose.php"> Salir</a></li>
            </ul>
            
        </nav>

    </header>
    <main>
        <section>
            <article>
               <!-- <h1><div class="titulo1">Centro Medico JS</div></h1>-->
               <h1>Pacientes</h1>
               <?PHP
               
               
               ?>

            </article>
        </section>
    </main>
    <aside></aside>
    <footer class="piepag"></footer>
    
    
</body>
</html>