<?php
	$_POST[Carta1]	="";
	$_POST[Carta2]	="";
	$_POST[Carta3]	="";
	$_POST[Carta4]	="";
	$_POST[chofer]	="";
	$_POST[placas]	="";
	$_POST[cliente]	="";
	$_POST[n_c]		="";
	$_POST[Revisado]="";
	$_POST[come]	="";
	$_POST[D]		="";
	$_POST[M]		="";
	$_POST[A]		="";
	$_POST[D_c]		="";
	$_POST[M_c]		="";
	$_POST[A_c]		="";
	$_POST[D_r]		="";
	$_POST[M_r]		="";
	$_POST[A_r]		="";
	$_POST[km_i]	="";
	$_POST[km_f]	="";
	$_POST[hidden_fe]	="";
	$_POST[hidden_v]	="";
	$_POST[hidden_d]	="";
	$_POST[hidden_c]	="";
	$_POST[hidden_c_via]="";
	$_POST[hidden_f]	="";
	$_POST[hidden_r]	="";
	$_POST[hidden_g]	="";
	$_POST[hidden_m]	="";
	$_POST[hidden_ab]	="";
	$_POST[hidden_ac]	="";
	$_POST[hidden_ac_a]	="";
	$_POST[revisado]	="";
	$_POST[flete_r]		="";
	$_POST[comi]		="";
	$_POST[presio_d]	="";

	function borrar($n1){
		for($y=1; $y<=20; $y++){
			$N=$n1.$y;
			$_POST[$N]='';
		}
	}	
	borrar('1TEXT');
	borrar('1TEXT_C');
	borrar('2TEXT');
	borrar('2TEXT_C');
	borrar('3TEXT');
	borrar('3TEXT_C');
	borrar('4TEXT');
	borrar('4TEXT_C');        
	borrar('4TEXT_VIA');
	borrar('4TEXT_C_VIA');
	borrar('5TEXT');
	borrar('5TEXT_C');
	borrar('6TEXT');
	borrar('6TEXT_C');
	borrar('7TEXT');
	borrar('7TEXT_C');
	borrar('8TEXT');
	borrar('8TEXT_C');
	borrar('ab_Com');
	borrar('ab');
	borrar('ID_ac');
	borrar('ac');
?>