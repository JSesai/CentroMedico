<?PHP
//si fue presionado el boton
if($_POST["updateCita"]){

    //recuperamos la informacion del formulario con ayuda de la super global post
    $IdCita= $_POST["idPacient"];
    $newDate= $_POST["dateCita"];
    $newHr= $_POST["timeCita"];

    //llamamos al metodo que actualiza la BD
    actDate($IdCita, $newDate, $newHr);

}


?>

<?PHP
        //metodo que actualiza la BD recibe el Id de la cita, la nueva fecha de la cita y la nueva hora de la cita
        function actDate($IdCita, $newDate, $newHr){
            
                    
                try{
        
                    //retrocedemos con los 2 puntos, entramos a carpeta BD y seleccionamos archivo llamado Conexion; este archivo tiene la cadena de conexion
                    include("../BD/Conexion");
                
                    //creamos la sentencia SQL UPDATE empleamos marcadores 
                    $sql= 'UPDATE cita SET fecha=:m_fecha, hora =:m_hora WHERE id_cita =:m_idCita';
                    
                    
                    //hacemos uso de la sentencia preparada de nuestro objeto de conexion y le pasamos la sentencia sql
                    $resultado= $bds->prepare($sql);
                
                    //ahora se ejecuta la sentencia, debemos sustituir los marcadores por las variables que contiene la informacion que el usuario ingreso
                    $resultado->execute(array(":m_fecha"=>$newDate , ":m_hora"=>$newHr, ":m_idCita"=>$IdCita));
                
                    //mostramos mensaje de registro exitoso
                    echo "Cita registrada Correctamente!!";
                
                    //liberamos la memoria para no consumirn recursos de manera innecesaria
                    $resultado->closeCursor();
                    header("Location:modCita.php");
               
                    //capturamos el error en caso de fallar la conexion
                    }catch(Exception $e){
                
                
                        //indicamos que nos muestre la linea de error
                        echo "Error en" . $e->getLine();
                
                    }
            
        }
        
        ?>