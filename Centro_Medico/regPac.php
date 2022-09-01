<?PHP
//si se ha precionado el boton enviar entra al siguiente bloque, el boton submit fuen nombrado: name="patientRecord"
if($_POST["patientRecord"]){

    //recuperamos variables globales del formulario y las almacenamos en variables locales
    $idpac=$_POST["idpac"];
    $namePac= $_POST["nombrepac"];
    $ape1= $_POST["lastNamePac"];
    $ape2= $_POST["lastName2Pac"];
    $ps=$_POST["pas"];
    $confps=$_POST["confpaspac"];

    //validamos campos con esta funcion y enviamos variables recuperadas del form
    validDat($idpac, $namePac, $ape1, $ape2, $ps, $confps);

    
}

    function validDat($idpac, $namePac, $ape1, $ape2, $ps, $confps){

        //validamos que ninguna caja este vacia
        if(empty($idpac)){
            echo "Ingrese el ID";

        }
        elseif(empty($namePac)){
            echo "Ingrese Nombre";
        }
        elseif(empty($ape1)){
            echo "Ingrese Apellido Paterno";
        }
        elseif(empty($ape2)){
            echo "Ingrese Apellido Materno";
        }
        elseif(empty($ps)){
            echo "Ingrese Contraseña";
        }
        elseif(empty($confps)){
            echo "Confirme contraseña";
        }

        //expresiones regulares para validar datos
       

        if(!empty($ps)){
            //validamos que contengan 8 posiciones
            if(strlen($ps)!=8){
                echo "Contraseña de tener 8 caracteres";

            }
            //validamos que contengan letras en minusculas
            elseif(!preg_match('`[a-z]`',$ps)){
                echo "Contraseña de tener letras en minusulas";
            } 

            //validamos que contenga letras en mayuscula
            elseif(!preg_match('`[A-Z]`',$ps)){
                echo "Contraseña de tener letras en Mayusculas ";
            }

            //validamos que contengan numeros 
            elseif(!preg_match('`[#$&%._-]`',$ps)){
                echo "Contraseña debe tener caracteres #,$,-,_,&,% ";
            }

            else{


            $compstr= strcmp($ps,$confps);
            
                

                //comparamos los strings usando strcmp y almacenamos en variable compstr
            
            if($compstr){
                echo " La contraseña debe coincidir con la validacion";
            }

            
            else{
                //validamos que el ID no exista en la tabla pacientes con la funcion, le pasamos la variable que contiene el dato ID ingresado por el usuario
                validaId($idpac,$namePac, $ape1, $ape2, $ps);
                //entra a este bloque si coinciden las contraseñas
                
                
            }
            
        }
    }

    }

    //funcion que valida el id con una consulta SELECT
    function validaId($idpac, $namePac, $ape1, $ape2, $ps){
        
        //llamamos al archivo donde se efectua la conexion a la BD
        include("BD/Conexion");

        //creamos la sentencia SQL INSERT empleamos marcadores con el fin de evitar inyecciones SQL 
        $sql="SELECT Id_Paciente FROM pacientes WHERE Id_Paciente = :m_Id";
        //hacemos uso de la sentencia preparada de nuestro objeto de conexion y le pasamos la sentencia sql
        $resultado= $bds->prepare($sql);

        //ahora se ejecuta la sentencia, debemos sustituir el marcador por la variable que contiene el ID que el usuario ingreso
        $resultado->execute(array(":m_Id"=>$idpac));
        
        $registro= $resultado->fetch(PDO::FETCH_ASSOC);
        //validamos si existe el registro 
        if($registro){
            echo "Ya existe el ID, intente con otro valor";
        }
        else{
            //insertamos los registros ya validados 
            insertPac($idpac,$namePac, $ape1, $ape2, $ps);
        }
            

    }

    function insertPac($idpac, $namePac, $ape1, $ape2, $ps){
        try{

            //llamamos al archivo donde se efectua la conexion a la BD
            include("BD/Conexion");
        
            //creamos la sentencia SQL INSERT empleamos marcadores con el fin de evitar inyecciones SQL 
            $sql= "INSERT INTO pacientes (Id_Paciente, nombre, apellidoPaterno, apellidoMaterno, Password) VALUES (:m_Idpac, :m_nom, :m_aP, :m_aM, :m_pas)";
            
            //hacemos uso de la sentencia preparada de nuestro objeto de conexion y le pasamos la sentencia sql
            $resultado= $bds->prepare($sql);
        
            //ahora se ejecuta la sentencia, debemos sustituir los marcadores por las variables que contiene la informacion que el usuario ingreso
            $resultado->execute(array(":m_Idpac"=>$idpac, ":m_nom"=>$namePac, ":m_aP"=>$ape1, ":m_aM"=>$ape2, ":m_pas"=>$ps));
        
            //mostramos mensaje de registro exitoso
            echo "Te has registrado!!";
        
            //liberamos la memoria para no consumirn recursos de manera innecesaria
            $resultado->closeCursor();
        
            //capturamos el error en caso de fallar la conexion
            }catch(Exception $e){
        
        
                //indicamos que nos muestre la linea de error
                echo "Error en" . $e->getLine();
        
            }
    }
    



    




?>