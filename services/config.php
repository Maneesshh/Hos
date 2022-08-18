<?php
  class Config{
  	  public static function getConnection(){
  	  	$conn=new mysqli("localhost","root","","pms");
  	  	return $conn;
  	  }
  }
?>