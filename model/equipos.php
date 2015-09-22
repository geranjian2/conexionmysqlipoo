<?php
	require("conexion.php"); 
		class Equipos
		{
			private $equipo;
			private $numero;
			private $tipo;
			private $ident_red;
			private $dependencia;
			private $usuario;
			public function __construct($equipo,$numero,$tipo,$ident_red,$dependencia,$usuario)
			{
				$this->equipo=$equipo;
				$this->numero=$numero;
				$this->tipo=$tipo;
				$this->red=$ident_red;
				$this->dependencia=$dependencia;
				$this->usuario=$usuario;
				


			}
			public function encontrarEquipo()
			{
				$objConexion = new conexion();
				$sql="SELECT * FROM equipos WHERE id_equipos = '$this->equipo'  ";
				$objConexion->ejecutar($sql);
				return $datos = $objConexion->ejecucion($sql);
				$objConexion->cerrarconexion();

			}
			public function Mostrar_equipo()
			{
				$objConexion = new conexion();
				$sql="SELECT * FROM equipos WHERE id_equipos = '$this->equipo'  ";
				 return $resultado1=$objConexion->datosIndividual($sql);
				 $objConexion->cerrarconexion();
			}
			public function Mostrar_equipos()
			{
				$objConexion = new conexion();
				$sql="SELECT * FROM equipos   ";
				 return $datos=$objConexion->datosTodos($sql);
				 $objConexion->cerrarconexion();	
			}
			public function InsertarEquipo()
			{
				$objConexion = new conexion();
				$sql="INSERT INTO equipos VALUES (NULL,'$this->numero','$this->tipo','$this->red','$this->dependencia','$this->usuario')";
				$objConexion->ejecutar($sq);
				$insert=$objConexion->ejecucion($sql);
				return $insert;
				$objConexion->cerrarconexion();

			}

			
		}
		
		


		$num=3;
		$nume="E-64";
		$tipo="FIJO";
		$red="ADMON";
		$dependencia="ADMINISTRATIVA";
		$usuario="5";
		$objEquipos= new Equipos($num,$nume,$tipo,$red,$dependencia,$usuario);
		// $insertarequipo=$objEquipos->InsertarEquipo();
		// if($insertarequipo > 0)
		// {
		// 	echo "Se inserto satisfactoriamente"."<br>";
		// }
		// else
		// {
		// 	echo "Algo salio mal"."<br>";
		// }


		$existe= $objEquipos->encontrarEquipo();
		if($existe > 0)
		{
			echo $num."Ya existe"."<br>";
		}
		else
		{
			echo "No hay usuario";
		}




		$datos=$objEquipos->Mostrar_equipo();
		echo $datos["tipo"];
		echo $datos["usuario"];

		echo "<br>";

		?>
		<table border="1">
		<thead>
			<td>Tipo</td>
					<td>Usuario</td>
					<td>Id_equipos</td>
				</th>
			</thead>
		<?php 

		$data=$objEquipos->Mostrar_equipos();
		foreach ($data as $datas ) {
			?>
				
			<tbody>
				<tr>
					<td><?php echo $datas["tipo"]; ?></td>
					<td><?php echo $datas["usuario"];  ?></td>
					<td><?php echo $datas["id_equipos"]; ?></td>
				</tr>
			</tbody>
	
			
			
			
		<?php 
		}
		?>
			</table>
		<?php 


?>
