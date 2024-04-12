<?php 
    /*En la clase Venta:
    1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una 
    colección de motos y el precio final.
    2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
    atributo de la clase.
    3. Los métodos de acceso de cada uno de los atributos de la clase.
    4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
    5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
    incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
    vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
    Utilizar el método que calcula el precio de venta de la moto donde crea necesario.*/
    
    class Venta{
        private $numeroVenta;
        private $fechaVenta;
        private $objCliente;
        private $arrayMotos;
        private $precioFinal;

        // Metodo constructor de la clase Venta
        public function __construct($numVenta,$fecha, Cliente $cliente, $colMotos,$precio){
            $this->numeroVenta = $numVenta;
            $this->fechaVenta = $fecha;
            $this->objCliente = $cliente;
            $this->arrayMotos = $colMotos;
            $this->precioFinal = $precio;
        }

        // Metodos GET de la clase Venta
        public function getNumeroVenta(){
            return $this->numeroVenta;
        }

        public function getFechaVenta(){
            return $this->fechaVenta;
        }

        public function getCliente(){
            return $this->objCliente;
        }

        public function getMotos(){
            return $this->arrayMotos;
        }

        public function getPrecioFinal(){
            return $this->precioFinal;
        }



        // Metodos SET de la clase Venta 
        public function setNumeroVenta($numVenta){
            $this->numeroVenta = $numVenta;
        }

        public function setFechaVenta($fecha){
            $this->fechaVenta = $fecha;
        }

        public function setCliente($cliente){
            $this->objCliente = $cliente;
        }

        public function setMotos($colMotos){
            $this->arrayMotos = $colMotos;
        }

        public function setPrecioFinal($precio){
            $this->precioFinal = $precio;
        }


        // Metodo que muestra la informacion de la clase Venta
        public function __toString(){
            return "Numero:\n".$this->getNumeroVenta()."\n".
                    "Fecha:\n".$this->mostrarFecha()."\n".
                    "Cliente:\n".$this->getCliente()."\n".
                    "Motos:\n".$this->mostrarMotos()."\n".
                    "Precio final: $\n".$this->getPrecioFinal()."\n";
        }

        // Metodo que muestra las motos de la coleccion
        public function mostrarMotos(){
            $arregloMotos = $this->getMotos();
            $cadena = "";
            $numMoto = 0;
            for($i=0;$i<count($arregloMotos);$i++){
                $numMoto++;
                $moto = $arregloMotos[$i];
                $cadena = $cadena. "Moto: ".$numMoto."\n".$moto."\n";
            }
            return $cadena;
        }

        // Metodo que retorna la fecha
        public function mostrarFecha(){
            $fecha = $this->getFechaVenta();
            return $fecha["Dia"]. "/" .$fecha["Mes"]. "/" .$fecha["Anio"]."\n";
        }

        // Metodo que recibe un objeto moto y lo incorpora a la colección de motos de la venta
        public function incorporarMoto($objMoto){
            $arregloMotos =  $this->getMotos();
            $valor = $objMoto->darPrecioVenta();
            $estado = $objMoto->mostrarEstado();
            if($valor != -1 && $estado == "Si"){
               $arregloMotos[] = $objMoto;
               $this->setPrecioFinal($valor + $this->getPrecioFinal());
               $this->setMotos($arregloMotos);
            }
        }
    }