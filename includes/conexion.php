<?php
    function conexion(){
        return mysqli_connect('localhost',
                             'root',
                             '',
                             'carrental');
    }

  /*  if(conexion()){
        echo("verdad");
    }*/
?>    