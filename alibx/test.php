<?php 
  $arr = [0 =>'$green', 1 =>'$red', 2 =>'$while', 3 =>'$black',4 =>'$green1', 5 =>'$blue1', 6 =>'$white1'];
function aa() {
	echo $GLOBALS[arr][rand(0,6)];
}

aa();

 ?>