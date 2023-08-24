<?php 
/*
 primero definimos la logica del script que procesara
 el parseado de los numeros romanps
*/
$romannum = $_GET['romanum'];
function tranform_roman(array $values){
    $numeros = array();
    $arr = ['I' => 1,'V' => 5,'X' => 10,'L' => 50,'C' => 100 ,'D' =>500,'M' =>1000];
    foreach($values as $key => $valor){
        if(array_key_exists($valor,$arr)){
          $numeros[] = $arr[$valor];
        }
    }
    return $numeros;
}
function sum_roman(array $elms){
  $total_elems = count($elms);
  $limit = $total_elems -1;
  $total = 0;
  $i =0;
  while($i < $total_elems){
    $next = $i + 1;
/* 
El if in-line tiene la siguiente estructura:
condicion ? retornoPorTrue : retornoPorFalse;
Lo anterior debe leerse de la siguiente manera: si se verifica la condicion entonces 
se retorna la expresión ubicada entre el ? (signo de interrogación) y los : (dos puntos). 
Si la condicion resulta falsa entonces se retorna la expresión ubicada después 
de los : (dos puntos)
*/
    $offset = $next <= $limit  ? $next : $i;
    if($elms[$offset] > $elms[$i]){
      $total += $elms[$i+1] - $elms[$i];
      $i +=2;// si el elemento primero es menor que el elemento i + 1
      if($i == $limit) //si el elemento penúltimo es evaluado, entonces ¡para!
       break;
    }else{
        $total += $elms[$i];
        $i++;
    }
    
  }
  return $total;
}

/**------------------ para devolver el json en el response------------------------------------- */
/**
 * Los metodos _isascii, _httpencode, _chezkoutput, Output
 * son extraidos de la clase fpdf licenciada
 * bajo GPL license del author
 * Author:  Olivier PLATHEY  
 * Contrib:OseChez
 */
function _isascii($s) {
  // Test if string is ASCII
  $nb = strlen($s);
  for ($i = 0; $i < $nb; $i++) {
      if (ord($s[$i]) > 127)
          return false;
  }
  return true;
}
function _httpencode($param, $value, $isUTF8) {
// Encode HTTP header field parameter
if (_isascii($value))
   return $param . '="' . $value . '"';
if (!$isUTF8)
   $value = utf8_encode($value);
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
   return $param . '="' . rawurlencode($value) . '"';
else
   return $param . "*=UTF-8''" . rawurlencode($value);
}
function _checkoutput() {
    if (PHP_SAPI != 'cli') {}
    if (ob_get_length()) {
        // The output buffer is not empty
        if (preg_match('/^(\xEF\xBB\xBF)?\s*$/', ob_get_contents())) {
            // It contains only a UTF-8 BOM and/or whitespace, let's clean it
            ob_clean();
        } else{
          ob_clean();
          echo "Some data has already been output, can't send JSON data";
        }
           
    }
}
function Output($output=null,$isUTF8 = false) {
          // Send to standard output
          _checkoutput();
          if (PHP_SAPI != 'cli') {
              
              //para poder realizar la peticion desde un orígen diferente: archivo html
              header('content-type: application/json; charset=utf-8');
              header('Access-Control-Allow-Origin: *');
              header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
              header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
          }
          echo json_encode($output);
        
  return '';
}
$response = array("roman"=>'');
if(isset($_GET['romanum'])){
  $values = [];
  $tot = 0;
  $roman  = strtoupper($romannum);
  $split  = str_split($roman);
  $values = tranform_roman($split);
  
  $tot     = sum_roman($values);
  $response['roman'] =$tot;
  
  
}


Output($response);