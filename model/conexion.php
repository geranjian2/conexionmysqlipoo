<?php
	class conexion
 	{
 		public static function conect()
 		{
 			 $servidor = "localhost";
 			 $user="root";
 			 $pass="123456";
 			 $datab="equipos_hidroyunda";

 			$conexion=new mysqli($servidor,$user,$pass,$datab);
 			if($conexion->connect_errno)
					{
						echo "Fallo la base de datos :
						(" .$conexion->connect_errno. ")".$conexion->connect_error;
						$conexion->close();
					}
					else
					{
						$conexion->set_charset('utf8');
						
						// $conexion->query("SET NAMES 'utf8'");
					}
			return $conexion;
 		}
 		public function __construct()
 		{
 			 $this->db=conexion::conect();
 		}
 		public function ejecutar($sql)
 		{
 			$result=$this->db->query($sql);
			return $result;
 		}
 		public function ejecucion($sql)
 		{
 			
			$sentencia= $this->db->affected_rows;
			return $sentencia;
 		
 		}
 		public function datosTodos($sql)
 		{
 			if(!$resultado=$this->db->query($sql))
				{
					$total= "Error";
				}
				else
				{
					
					while ($fila=$resultado->fetch_assoc()) {
						
							$total[]=$fila;			
					}
				}
		return $total;
 		}
 		public function datosIndividual($sql)
 		{
 		
 			if(!$resultado1=$this->db->query($sql))
				{
					$resultado1=$this->db->connect_error;
				}
				else
				{
					  return $resultado1->fetch_assoc();
				}
				
				
 		}
 		
 		public function cerrarconexion()
			{
				$this->db=conexion::conect();
				$cerrar=$this->db->close();

			}
			public function cerrarfiltro($sql){
	
				mysqli_free_result($sql);
			}
 	}
 	
?>
