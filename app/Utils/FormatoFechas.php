<?php
namespace App\Utils;
class FormatoFechas{
    private $fecha;
    private $meses;
    private $mesAbreviado;
    private $months;
  public function __construct($fecha){
      $this->fecha = $fecha;
      $this->meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio",
                       "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      $this->mesAbreviado =array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
      $this->months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  }
  private function makeFecha(){
      $fch =  date('M, d M Y H:i:s a', strtotime($this->fecha));
      $f   = explode(" ",$fch);
      for($i = 0; $i < count($this->months); $i++){
         if(in_array($f[2],$this->months)){
             $fch= str_replace($this->months[$i],$this->meses[$i],$fch);
          }
      }
      
          return $fch;
  }
  private function convertDate(){
      $fch =  date('d M, Y', strtotime($this->fecha));
      $f   = explode(" ",$fch);

      for($i = 0; $i < count($this->months); $i++){
         if(in_array($f[1],$this->months)){
          $m = $this->mesAbreviado[$i].", ";
            $fch= str_replace($this->months[$i],$m,$fch);
          }
      }
      
          return $fch;
  }
  public function getFechaFormateada(){
      return $this->makeFecha();
  }
  public function getDateAbreviado(){
     return $this->convertDate();
  }
}