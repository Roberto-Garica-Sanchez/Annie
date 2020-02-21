<?php
class validaciones{
	private $Ares_v1;
	private $libre_v1;
	private $libre_v2;
	private $libre_v4;
	private $libre_v5;
	private $phpv;
	private $conexion;
	private $database;
	private $tabla;

	public function __construct($database,$tabla,$phpv,$conexion){
		$this->database	=$database;
		$this->tabla	=$tabla;
		$this->Ares_v1	=new Ares_v1();		
		$this->libre_v1	=new libre_v1();	
		$this->libre_v2	=new libre_v2($phpv,$conexion);	
		$this->libre_v4	=new libre_v4($phpv,$conexion);	
		$this->libre_v5	=new libre_v5($phpv,$conexion,'');
		$this->phpv=$phpv;	
		$this->conexion=$conexion;	
	}
	public function vacio(){
		
	}
	public function columnas($database,$tabla){
		if(!empty($database))	$this->database	=$database;
		if(!empty($tabla))		$this->tabla	=$tabla;
		$tabla="COLUMNS";
		$getColumnas        = array('*') ;
		$BuscaColumnas      = array('TABLE_SCHEMA','TABLE_NAME') ;
		$BuscaDatos         = array($this->database,$this->tabla);
		$array=array(
			"tabla"=>$tabla,
			"Operacion"=>
			array(      'SELECT'=>array(
				"Activar"	=>'true',//'false'
				"LIKE"		=>'false',//'false'
				"getColumnas"    =>$getColumnas,//array()
				"BuscaColumnas"  =>$BuscaColumnas,//array()
				"BuscaDatos"     =>$BuscaDatos//array()

				)
			)			
		);
		$this->Ares_v1->GeneraSql($array);
		$sql=$this->Ares_v1->viewSql();
		$this->libre_v4->KeyColumnUsege($this->database,$this->tabla);
		$columnaId=$this->libre_v4->getKeyColumnUsege();
		
		$this->libre_v4->Columnas($this->database,$this->tabla);
		$columnas=$this->libre_v4->getColumnas();
		$CamposVacios=$this->libre_v2->crea_array('');

		for ($x=0; $x <count($columnas) ; $x++) { 
			if($columnaId!=$columnas[$x]){//verifica que lacolumnas no sea una ID o primaria 
				$estatus='true';
				if(empty($_POST[$columnas[$x]])){$estatus='false';}
				
				$CamposVacios=$this->libre_v2->add_array($CamposVacios,$columnas[$x],$estatus);
			}
			
		}
		//echo count($vericasion);
		//var_dump($CamposVacios);
		$verifi=array(
			'CamposVacios'=>$CamposVacios
		);
		
	}

}
class inface{
	private $Ares_v1;
	private $libre_v1;
	private $libre_v2;
	private $libre_v4;
	private $libre_v5;
	private $phpv;
	private $conexion;
	private $database;
	private $tabla;

	public function __construct($database,$tabla,$phpv,$conexion){
		$this->database	=$database;
		$this->tabla	=$tabla;
		$this->Ares_v1	=new Ares_v1();		
		$this->libre_v1	=new libre_v1();	
		$this->libre_v2	=new libre_v2($phpv,$conexion);	
		$this->libre_v4	=new libre_v4($phpv,$conexion);	
		$this->libre_v5	=new libre_v5($phpv,$conexion,'');
		$this->phpv=$phpv;	
		$this->conexion=$conexion;	
	}
    public function interface($array){
		/*
		$array=array(
			'tipo'=>array('formulario'=>'','lista'=>''),
			'class'=>array(
				'columnaFija'=>'',
				'casilla'=>'',
				'id'=>''
			),
			'validacionFormularo'=>$validacionFormularo,
			'CambiosColumnas'=>array(
				'TextColumna'=>$TextColumna,                     //remplaza el nombre de una columna contador_inicial -> Inicio de Contador 
				'ColumnasEspeciales'=>$ColumnasEspeciales       //si se activa es te puede ingresar algo diferente a text
			),
			"lista"=>array(
			    "ByOrder"=>array(
					"Columna"	=>'Fecha',
					"ASC-DESC"	=>'DESC'
				}
            )
		);
		*/
		
		static $index;
		if(empty($index))$index=1;
		$class=$array['class'];
		$red='box-shadow: inset 0px 0px 5px 2px #b93939;';

        $this->libre_v4->Columnas($this->database,$this->tabla);
		$this->libre_v4->KeyColumnUsege($this->database,$this->tabla);
		$this->libre_v2->db($this->database,$this->conexion,$this->phpv);
		$key	= $this->libre_v4->getKeyColumnUsege();
		$columnas= $this->libre_v4->getColumnas();
		$values= $this->libre_v4->ColunasInPost();

		if($array['tipo']['formulario']=='true'){
			
			for ($x=0; $x < count($columnas); $x++) { 
				$libre='';
				$style='';
				#$js='onKeypress="return anti_enter(event);" onkeyup="EnterToTab(event,this);" ';
				if($x+1<count($columnas)){
					$next="'".$columnas[$x+1]."'";
					$js='onKeypress="return anti_enter(event);" onkeyup="FocusToNext(event,this,'.$next.');"';
				}
				$colum=$this->libre_v4->getColumnas()[$x];
				if($columnas[$x]==$key){$libre='readonly="readonly"';}else{
					$libre="tabindex='".$index."'"; 
					if($index==1){$libre=$libre.' autofocus ';}
					$index++;
				}
				############# Procesos de Verificasiono 
				if(!empty($array['viewValidacion']) and $array['viewValidacion']=='true'){	
					#echo array_keys($array['validacionFormularo']);
					
					if($array['validacionFormularo'][$columnas[$x]]=='false')$style=$red;
				}
				############# Comprueba si no existe una columna de texto cambiada 
				if(!empty($array['CambiosColumnas']['TextColumna'][$columnas[$x]])){
						$colum=$array['CambiosColumnas']['TextColumna'][$columnas[$x]];
					
				}
				echo $this->libre_v5->input('button','',$colum,'',$class['columnaFija'],'','disabled','');
				$colum=$this->libre_v4->getColumnas()[$x];
				############# Comprueba si no existe una columna especial 		
				if(!empty($array['CambiosColumnas']['ColumnasEspeciales'][$columnas[$x]])){		#verifica si ingreso algun dato para cambia las columnas Actual
					$atributoColumna=$array['CambiosColumnas']['ColumnasEspeciales'][$columnas[$x]];
					switch ($atributoColumna['type']) {
						case 'despliegre':
							//echo $this->libre_v2-> despieges($colum,'',$inicio,$fin,$libre,$id);
							$despieges=array(
								"name"=>$colum,
								"id"=>$colum,
								"Elementos"=>$atributoColumna['ListaDeDatos'],
								"TextComplemento"=>'',
								"class"=>$class['casilla'],
								"style"=>$style,
								"libre"=>$libre.$js.$colum
							);			
							echo $this->libre_v5->despieges($despieges);
						break;
						case 'despliegre_mysql':
							$libre="style='".$style."' ".$js." id='".$colum."'";
							echo $this->libre_v2-> despliegre_mysql($colum,$colum,$atributoColumna['ConsultaMysql'],$atributoColumna['DatosMostrar'],$this->phpv,$libre,$class['casilla'],'','');		
						break;
						case 'data':
							$type='date';
							echo $this->libre_v5->input($type,$colum,$values[$x],$colum,$class['casilla'],'',$libre.$js,$style);
						break;
						
					}
				}
				############# ejecuta Codigo Normal
				else{
					$type='input';
					if($colum=='Fecha' or $colum=='fecha'){$type='date';}
					
					echo $this->libre_v5->input($type,$colum,$values[$x],$colum,$class['casilla'],'',$libre.$js,$style);
				}
			}
		}
		if($array['tipo']['lista']=='true'){	
			#Presntas Las Columnas
			echo"<div>";         
				for ($x=0; $x < count($columnas); $x++) { 
					$libre='';
					if($columnas[$x]==$key){
						$CLASS=$class['id'];
					}else{
						$CLASS=$class['casilla'];
					}
					$type='submit';
					if($columnas[$x]=='Fecha' or $columnas[$x]=='fecha'){$type='date';$libre='disabled';}
					echo $this->libre_v5->input($type,'',$columnas[$x],'',$CLASS,'',$libre,'');
				}			
			echo"</div>";
			$ByOrder='';
			if(!empty($array['lista']['ByOrder']))$ByOrder=$array['lista']['ByOrder'];
			#descarga los datos de la lista a presentar 
			$array=array(
				"tabla"=>$this->tabla,
				"Operacion"=>
				array('SELECT'=>array(
						"Activar"	=>'true',//'false'
						"LIKE"		=>'false',//'false'
						"getColumnas"	=>array('*'),
						"BuscaColumnas"	=>false,
						"BuscaDatos"	=>false,
						"ByOrder"		=>$ByOrder
						
					)
				)
			);
			$this->Ares_v1->GeneraSql($array);
			$sql=$this->Ares_v1->getSql();
			$res=$this->libre_v2->ejecuta($this->conexion,$sql,$this->phpv);
			#mysqli_data_seek($res,0);                                                          //inicia revisar lso datos desde la parte superior 
			#presentas los registros de las lista 
			while ($fila = mysqli_fetch_array($res)) {         
				for ($x=0; $x < count($columnas); $x++) { 
					$type='submit';
					$name='';
					$libre='';
					if($columnas[$x]==$key){
						$name='Descargar';
						$CLASS=$class['id'];
					}else{
						$CLASS=$class['casilla'];
						$libre='disabled';
					}
					if($columnas[$x]=='Fecha' or $columnas[$x]=='fecha'){$libre='disabled';}
					if(empty($fila[$columnas[$x]])){$fila[$columnas[$x]]=" ";}
					echo $this->libre_v5->input($type,$name,$fila[$columnas[$x]],'',$CLASS,'',$libre,'');
				}
				echo"<br>";
			}
		}
	}
	public function menuHorizontal($name_menu,$elemento_menu,$otros_arrays){		
		
		if(empty($otros_arrays['ocultar']))$otros_arrays['ocultar']='';
		$class=array(
			'Conte_princiapal'=>'Lateral',
			'Div_Opcion'=>'',
			'Boton'=>'Boton_menu1',
			'img'=>''
		);
		$otros_arrays=array(
			'img_activa'=> 'false',
			'img_defaul'=>'/img/defaul.jpg',
			'img'=>array(),
			'memoria'=>array('Activa'=>true,'type'=>'hidden'),
			'ocultar'=>$otros_arrays['ocultar']
		);
		$this->libre_v5->menu($name_menu,$elemento_menu,$class,$otros_arrays);
	}
    
}
class subRutinas_combustible{	
	private $Ares_v1;
	private $libre_v2;
	private $libre_v5;
	private $subRutinas_combustible;
	private $phpv;
	private $conexion;
	
	public function __construct($phpv,$conexion){	
		$this->Ares_v1	=new Ares_v1();
		$this->libre_v5	=new libre_v5($phpv,$conexion,'');
		$this->libre_v2	=new libre_v2($phpv,$conexion);
		
		$this->phpv=$phpv;	
		$this->conexion=$conexion;	
	}
	public function ventana_rapida($array){
		$array=array(
			
		);
		#descarga los tanques 
		$datos_tanque_consu =$this->libre_v2->consulta('tanques',$this->conexion,'desendente','','','',$this->phpv,'','');
		#calcula el nivel del tanque 
			#lista los tanques 
			while ($Tanques=$this->libre_v2->mysql_fe_ar		($datos_tanque_consu,$this->phpv,'')) {
				####	OBTIENE EL NIVEL ACTUAL DEL TANQUE 
					$CombustibleRestante=$Tanques['NivelActual'];	
					
				####	OBTIENE BUSCA RECARGAS DEL TANQUE (COMPRA DE COMBUSTIBLE)
					$array=array(
						"tanque"=>$Tanques['Nombre'],
						"FechaRegistro"=>$Tanques['Fecha'],
						"FechaInicio"=>$Tanques['Ultimo_Repostaje'],
						"Fechafinal"=>''
					);
					$Control=$this->Control_repostaje_tanque($array);	#SUBFUNCION  BUSCA SI SE REALIZARON REACARGAS DEL TANQUE (COMPRAS DE COMBUSTIBLE)      		     
					####	SI ENCONTRO DATOS Y ESTAS DESPUES DEL ULTIMOM REPOSTAJES 
					if($Control['Contador']==0 or ($Control['Contador']!=0 and $Control['Fechas'][0]>$Tanques['Fecha'])){	
						#obtiene los repostajes efectuados desde el registro del tanque hasta el primer repostaje (obio el tanque tiene combustibleanterior)
						if($Control['Contador']==0)$fecha_final=''; else$fecha_final=$Control['Fechas'][0];
						$array_bru=array(
							"Tanque"=>$Tanques['Nombre'],
							"Unidad"=>'',
							"LitrosRestantes"=>$Tanques['NivelActual'],
							"FechaInicio"=>$Tanques['Ultimo_Repostaje'],
							"Fechafinal"=>$fecha_final
						);
						####	OBTIENE LOS CONSUMO QUE SE LE HACEN AL TANQUE
							$Respotajes=$this->Busca_repostajes_unidades($array_bru);
							## CALCULA EL NIVEL ACTUAL - LOS CONSUMOS
							$CombustibleRestante=$CombustibleRestante-$Respotajes['SumaConsumo'];
						
						####COMPRA RECARGA DE TANQUE (COMPRA DE COMBUSTIBLE)
							## SI SE DETECTA ALGUNA RECARGA DE COMBUSTIBLE 
							if($Control['Contador']>0){
								$array_brt=array(
									"tanque"=>$Tanques['Nombre'],
									"NivelDetanque"=>$CombustibleRestante,
									"FechaInicio"=>$Tanques['Ultimo_Repostaje'],
									"Fechafinal"=>''
								);
								$busquesaRepostajes=$this->Busca_repostajes_tanques($array_brt);     
								$CombustibleRestante=$CombustibleRestante+$busquesaRepostajes['NuevoNivel'];       
								#NuevoNivel
								## GENERA EL SQL PARA ACTUALIZAR EL NIVEL 
								$array=array(
									"tabla"=>"tanques",
									"Operacion"=>
									array('UPDATE'=>array(
											"Activar"	=>'true',
											"LIKE"		=>'false',
											"ModifiColumnas"    =>array('Ultimo_Repostaje','NivelActual'),
											"ModifiDatos"    	=>array($busquesaRepostajes['FechaCierre'],$CombustibleRestante),
											"BuscaColumnas"  	=>array('Nombre'),
											"BuscaDatos"     	=>array($Tanques['Nombre'])
										)
									)
								);
								$this->Ares_v1->GeneraSql($array);
								$sql=$this->Ares_v1->getSql();
								#$this->Ares_v1->viewSql();

								
								if (mysqli_query($this->conexion, $sql)) {
									if(empty($consola))$consola='';
									if(empty($res))$res='';
									$res="OK";
									$consola=$consola."<a class='ok'>Se han Modificado ".mysqli_affected_rows($this->conexion)."</>";
							
								}else {
									echo "Error: " . $sql . "<br>" . mysqli_error($conexion);       //si la instruciones estan mal el programa devulvera un error 
								}
								
							}
					}
			}
		#descarga los datos actualizados
		$datos_tanque_consu =$this->libre_v2->consulta('tanques',$this->conexion,'desendente','','','',$this->phpv,'','');
		$Niveles=$this->libre_v2->mysql_fe_ar		($datos_tanque_consu,$this->phpv,'');
		echo"<div class='formularios'>";
			echo"<div class='titulos'>Combustible Restante</div>";
			#echo $this->libre_v5->input('button','','Tanque','','Diseno_botones2','','','');
			#echo $this->libre_v2->despliegre_mysql('ListaTanques','',$datos_tanque_consu,'Nombre',$this->phpv,'','Diseno_botones3','','');

			echo $this->libre_v5->input('button','','Litros Restantes','','Diseno_botones2','','','');
			echo $this->libre_v5->input('button','',$CombustibleRestante,'','Diseno_botones3','','','');
		echo"</div>";
		ob_start();  
		$interface = ob_get_contents();

        ob_end_clean();
		return array(
			"interface"=>$interface,
		);
	}
    function Control_repostaje_tanque($array){
		##EL PROGRAMA BUSCA COMPRA DE COMBUSTIBLE PARA EL TANQUE 
        /*
            $array=array(
                "tanque"=>$tanque,
                "FechaInicio"=>'',
                "Fechafinal"=>''
            );
        */
		if(empty($array['Fechafinal'])){$array['Fechafinal']=date("Y-m-d");}
		
        $sql="SELECT * FROM repostajes_tanques WHERE IDTanque='".$array['tanque']."' AND Fecha >'".$array['FechaInicio']."' AND  Fecha <='".$array['Fechafinal']."' ORDER BY Fecha ASC";#DESC
        #$sql="SELECT * FROM repostajes_tanques WHERE IDTanque='".$array['tanque']."' AND Fecha BETWEEN '".$array['FechaInicio']."' and '".$array['Fechafinal']."' ORDER BY Fecha ASC ";
        $res=$this->libre_v2->ejecuta($this->conexion,$sql,$this->phpv);
        $conta=mysqli_affected_rows($this->conexion);
        $Primera='false';
        $PrimerRepostaje='';
        $RepostajesFechas=array();
        while ($datos=$this->libre_v2->mysql_fe_ar		($res,$this->phpv,'')) {
            if( $datos['Fecha']>=$array['FechaInicio'] and $Primera=='false'){
                $PrimeroRepostaje=$datos['Fecha'];
                $Primera='true';
            }
            $RepostajesFechas[]=$datos['Fecha'];
        }
        return array(
            "PrimerRepostaje"=>$PrimerRepostaje,
            "Contador"=>$conta,
            "Fechas"=>$RepostajesFechas
        );

	}
	
    function Busca_repostajes_tanques($array_brt){
        /*
            $array_brt=array(
                "tanque"=>$tanque,
                "NivelDetanque"=>,
                "FechaInicio"=>'',
                "Fechafinal"=>''
            );
        */
        # obtiene la fechas del siguente repostaje despues de esta 
        $sql="SELECT * FROM repostajes_tanques WHERE IDTanque='".$array_brt['tanque']."' AND Fecha > '".$array_brt['FechaInicio']."'  ORDER BY Fecha ASC ";
        $res=$this->libre_v2->ejecuta($this->conexion,$sql,$this->phpv);
        $getFechafinal=$this->libre_v2->mysql_fe_ar		($res,$this->phpv,'');
        if(empty($array_brt['Fechafinal']))$array_brt['Fechafinal']=$getFechafinal['Fecha'];
            
        #obtiene las lisa de tanques aparti de las fechas establecidas 
        if(empty($array_bru['Fechafinal'])){$array_brt['Fechafinal']=date("Y-m-d");}
        $sql="SELECT * FROM repostajes_tanques WHERE IDTanque='".$array_brt['tanque']."' AND Fecha BETWEEN '".$array_brt['FechaInicio']."' and '".$array_brt['Fechafinal']."' ORDER BY Fecha ASC ";
        $res=$this->libre_v2->ejecuta($this->conexion,$sql,$this->phpv);
        //$datos_repostaje_tanque=$this->libre_v2->consulta('repostajes_tanques',$this->conexion,'IDTanque',$tanque,'Fecha','desendente',$this->phpv,'','');
        $Contador=mysqli_affected_rows($this->conexion);
        $fecha_previa='';
        $calculo_de_combustible=0;
               
        ob_start();   
        echo"<br>";
            echo"<div class='Contenedor_auto2'>";
            echo"Repostajes Encontrados: ";            
            echo $this->libre_v5->input('text','',$Contador,'','Medio','','','width: 100px;');       
            $fechaPrevia='';
            $nuevoNivel=$array_brt['NivelDetanque'];
            while ($RepostajesTanques=$this->libre_v2->mysql_fe_ar		($res,$this->phpv,'')) {
                $nuevoNivel= $nuevoNivel+$RepostajesTanques['Litros_Resividos'];
                echo"<p style='background: greenyellow; color: black;'>Repostaje Tanque</p>";
                echo"<br>Resividos: ";
                echo $this->libre_v5->input('text','',$RepostajesTanques['Fecha'],'','Medio','','','width: 100px;');
                echo"<br>Litros Resividos: ";            
                echo $this->libre_v5->input('text','',$RepostajesTanques['Litros_Resividos'],'','Medio','','','width: 100px;');
                echo"<br>Nuevo nivel: ";            
                echo $this->libre_v5->input('text','',$nuevoNivel,'','Medio','','','width: 100px;');
                echo"<br>";
                
                #obtiene la proxima fecha 
                    $sql="SELECT * FROM repostajes_tanques WHERE IDTanque='".$array_brt['tanque']."' AND Fecha > '".$RepostajesTanques['Fecha']."'  ORDER BY Fecha ASC ";
                    $Proxima=$this->libre_v2->ejecuta($this->conexion,$sql,$this->phpv);
                    $ProximaFecha=$this->libre_v2->mysql_fe_ar		($Proxima,$this->phpv,'');
                    
                
                if(empty($fechaPrevia)){$fechaPrevia=$RepostajesTanques['Fecha']; }
                #else{   if(!empty($fechaPrevia))$fechaPrevia=$RepostajesTanques['Fecha'];}
                if($fechaPrevia!=$ProximaFecha['Fecha'])$fechAproxima=$ProximaFecha['Fecha'];
                if($fechaPrevia==$ProximaFecha['Fecha'])$fechAproxima="";
                $array_bru=array(
                    "Tanque"=>$array_brt['tanque'],
                    "Unidad"=>'',
                    "LitrosRestantes"=>$nuevoNivel,#$RepostajesTanques['Litros_Resividos'],
                    "FechaInicio"=>$fechaPrevia,
                    "Fechafinal"=>$fechAproxima
				);
				$fechaCierre=$fechaPrevia;
                $fechaPrevia=$fechAproxima;
                $Respotajes=$this->Busca_repostajes_unidades($array_bru);
                $nuevoNivel=$nuevoNivel-$Respotajes['SumaConsumo'];
                echo"<p style='background: orangered; color: black;'>Repostaje Unidades</p>";
                
                echo"<br>Repostaje a Unidades: ";            
                echo $this->libre_v5->input('text','',$Respotajes['Contador'],'','Medio','','','width: 100px;');
                echo"<br>Litros Consumidos: ";
                echo $this->libre_v5->input('text','',$Respotajes['SumaConsumo'],'','Medio','','','width: 100px;color: red;');
                echo"<br>Litros Restantes: ";
				echo $this->libre_v5->input('text','',$nuevoNivel,'','Medio','','','width: 100px;');
				echo "<br>".$Respotajes['interface'];
                $fecha_previa=$RepostajesTanques['Fecha'];
                echo "<br>";
            }
            echo"</div>";
        
        $interface = ob_get_contents();
        ob_end_clean();
        return array(
            "interface"=>$interface,
            "Contador"=>$Contador,
			"NuevoNivel"=>$nuevoNivel,
			"FechaCierre"=>$fechaCierre
			
        );
	}
	
    function Busca_repostajes_unidades($array_bru){
        /*
            $array_bru=array(
                "Tanque"=>$tanque,
                "Unidad"=>$unidad,
                "LitrosRestantes"=>$LitrosRestantes,
                "FechaInicio"=>$fechainicio,
                "Fechafinal"=>$fechafinal
            );
        */        
        if(empty($array_bru['Fechafinal'])){$array_bru['Fechafinal']=date("Y-m-d");}
        
        #$sql="SELECT * FROM repostajes_unidades WHERE TanqueSurtidor='".$array_bru['Tanque']."' AND Fecha BETWEEN '".$array_bru['FechaInicio']."' and '".$array_bru['Fechafinal']."'  ORDER BY Fecha DESC";
        $sql="SELECT * FROM repostajes_unidades WHERE TanqueSurtidor='".$array_bru['Tanque']."' AND Fecha >='".$array_bru['FechaInicio']."' AND  Fecha <='".$array_bru['Fechafinal']."' ORDER BY Fecha DESC";
        $res=$this->libre_v2->ejecuta($this->conexion,$sql,$this->phpv);
        $Contador=mysqli_affected_rows($this->conexion);       
        
        $SumaConsumo=0;
            #titles 
        ob_start();  
        echo"Periodo: ";
        echo $this->libre_v5->input('text','',$array_bru['FechaInicio'],'','Medio','','','width: 100px;');
        echo $this->libre_v5->input('text','',$array_bru['Fechafinal'],'','Medio','','','width: 100px;');
            echo"<br>";
            echo $this->libre_v5->input('button','',' ','','Diseno_boton_id','','','');
            echo $this->libre_v5->input('text','','Fecha','','Medio','','','width: 100px;');
            echo $this->libre_v5->input('text','','Placas','','Medio','','','width: 100px;');
            echo $this->libre_v5->input('text','','Total Despachado','','Medio','','','width: 100px;');
            echo $this->libre_v5->input('text','','Comb. Restante','','Medio','','','width: 100px;');
            echo'<br>';
            $x=1;
            echo"<div class='Contenedor_auto2_2'>";
            while ($RepostajesTanques=$this->libre_v2->mysql_fe_ar		($res,$this->phpv,'')) {
                #echo"Fecha: ".$RepostajesTanques['Fecha'];#."<br>";
                echo $this->libre_v5->input('button','',$x,'','Diseno_boton_id','','','');
                echo $this->libre_v5->input('text','',$RepostajesTanques['Fecha'],'','Medio','','','width: 100px;');
                echo $this->libre_v5->input('text','',$RepostajesTanques['Placas'],'','Medio','','','width: 100px;');
                echo $this->libre_v5->input('text','',$RepostajesTanques['Total_Despachado'],'','Medio','','','width: 100px;');
                $SumaConsumo=$SumaConsumo+$RepostajesTanques['Total_Despachado'];
                $LitrosRestantes=$array_bru['LitrosRestantes']-$SumaConsumo;
                echo $this->libre_v5->input('text','',$LitrosRestantes,'','Medio','','','width: 100px;');
                
                $x++;
                echo"<br>";
            }
            echo"</div>";
            
        $intreface = ob_get_contents();
        ob_end_clean();
        return array(
            "interface"=>$intreface,
            "SumaConsumo"=>$SumaConsumo,
            "Contador"=>$Contador
        );
    }
}
?>