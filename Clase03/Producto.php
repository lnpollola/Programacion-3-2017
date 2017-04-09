<?php
    Class Producto
    { 

      public  $_codigo;
      public  $_descripcion;
      public  $_importe;

      function __construct($codigo,$descripcion,$importe)
      {
          $this->_codigo = $codigo;
          $this->_descripcion = $descripcion;
          $this->_importe = $importe;
      }

      function ToString()
      {
          return $this->_codigo.";".$this->_descripcion.";".$this->_importe;
      }



    }
?>        