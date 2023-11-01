<?php 

namespace EdiProceda;   
require 'src/Conemb.php';

use EdiProceda\Conemb;

$file_contents = file_get_contents('public/CONEMB.txt');
$conemb = new Conemb($file_contents);
print_r($file_contents);

