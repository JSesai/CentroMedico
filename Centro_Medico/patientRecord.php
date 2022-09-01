
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="stylesheet" href="CSS/Styles.css">
</head>
<body>
    <h1>Registrate</h1>
    <form action="regPac.php" class="EstiloForm" method="POST">
        <!-- Input de ID -->
        <label for="idpac">ID</label>
        <input type="text" name="idpac" class="field" required>
        <br>
        <!-- Input para nombre -->
        <label for="nombre">Nombre (s)</label>
        <input type="text" value="" name="nombrepac" class="field" required>
        <br>
        <!-- input para apellido paterno -->
        <label for="lastNamePac">Apellido Paterno</label>
        <input type="text" value="" name="lastNamePac" class="field" required>
        <br>
        <!-- Input para apellido materno -->
        <label for="lastName2Pac">Apellido Materno</label>
        <input type="text" value="" name="lastName2Pac" class="field" required>
        <br>
        <!-- Input para contraseña-->
        <label for="pas">Contraseña</label>
        <input type="password" name="pas" class="field" required size="8">
        <br>
        <!-- Input confirmar contraseña-->
        <label for="confpaspac">Confirmar contraseña</label>
        <input type="password" name="confpaspac" class="field" required  minlength="4" maxlength="8" size="10">
        <br>
        <input type="button" onclick="location.href='index.html';" value="Cancelar" class="btnform">

        <!-- <input type="button" value="Atras" class="btnform" name="atras"> -->
        <input type="submit" value="Registrarse" name="patientRecord" class="btnform">
        
        
        
    </form>
   

    
</body>
</html>

