<?php

    class libre_v3{
        function input($type,$name,$value,$style,$id,$class,$libre,$title){
            $res="<input type='$type' style='$style' id='$id'  class='$class' name='$name' value='$value' title='$title' $libre >";
            return $res;
        }
        function menu($name_menu,$elemento_menu,$class_menu){
            $conta=count($elemento_menu);
            echo libre_v3::input('hidden',$name_menu,$_POST[$name_menu],'','',$class_menu,'','');
            for($x=0; $x<$conta; $x++){
                if($_POST[$name_menu]==$elemento_menu[$x]){$class=$class_menu."_select";}else{$class=$class_menu;}
                echo"<input type='submit' name='".$name_menu."'value='".$elemento_menu[$x]."' class='$class'>";
            }

        }
    }
?>