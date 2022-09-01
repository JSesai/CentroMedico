<?PHP
//evaluamos si  
if(!isset($_GET["btndel"])){

include("../BD/Conexion"); 

$Id= $_GET["id"];

$bds->query('DELETE FROM cita WHERE id_cita=' .$Id);

header("Location:delCita.php");

}



?>