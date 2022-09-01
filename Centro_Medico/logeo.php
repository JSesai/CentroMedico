<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesion</title>
    <link rel="stylesheet" href="CSS/Styles.css">
    

</head>
<body>
    <header><h1>Inicia Sesión</h1></header>
    <main>
        <section>
            <article class="log">
                    <!-- formulario de logeo -->
                <form action="validarLogeo.php" class="EstiloForm" method="POST">
                    <!-- Input de Id -->
                    <label for="iduser">Ingrese su ID:</label>
                    <input type="text" name="iduser" class="field" required>
                    <br>
                    
                    <!-- Input para contraseña-->
                    <label for="pasUr">Ingrese Contraseña:</label>
                    <input type="password" name="pasUr" class="field" required>
                    <br>
                    <br>
                    <select name="tab">
                        <option>paciente</option>
                        <option>medico</option>
                    </select>
                    <br>
                    <br>
                    <input type="button" onclick="location.href='index.html';" value="CANCELAR" />

                    <input type="submit" value="INGRESAR" name="login" class="btnform">
                    
            
            
                </form>

            </article>
        </section>
    </main>
    <aside></aside>
    <footer></footer>
    
</body>
</html>