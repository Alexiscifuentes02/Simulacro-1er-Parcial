<?php 
   /*En la clase Cliente:
    0. Se registra la siguiente información: nombre, apellido,si está o no dado de baja,el tipo y el número de
    documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
    1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
    2. Los métodos de acceso de cada uno de los atributos de la clase.
    3. Redefinir el método _toString para que retorne la información de los atributos de la clase.*/

    class Cliente{
        private $nombreCliente;
        private $apellidoCliente;
        private $dadoBaja;
        private $tipoDocumento;
        private $documentoCliente;
        
        // Metdo constructor de la clase cliente
        public function __construct($nombre,$apellido,$estado,$tipo,$dni){
            $this->nombreCliente = $nombre;
            $this->apellidoCliente = $apellido;
            $this->dadoBaja= $estado;
            $this->tipoDocumento = $tipo;
            $this->documentoCliente = $dni;
        }

        // Metodos GET de la clase cliente
        public function getNombreCliente(){
            return $this->nombreCliente;
        }
        
        public function getApellidoCliente(){
            return $this->apellidoCliente;
        } 

        public function getDadoBaja(){
            return $this->dadoBaja;
        } 

        public function getTipoDocumento(){
            return $this->tipoDocumento;
        } 

        public function getDocumentoCliente(){
            return $this->documentoCliente;
        } 


        // Metodos SET de la clase cliente
        public function setNombreCliente($nombre){
            $this->nombreCliente = $nombre ;
        }

        public function setApellidoCliente($apellido){
            $this->apellidoCliente = $apellido;
        }

        public function setEstadoCliente($estado){
            $this->dadoBaja = $estado;
        }

        public function setTipoDocumento($tipo){
            $this->tipoDocumento = $tipo;
        }

        public function setDocumentoCliente($dni){
            $this->documentoCliente = $dni;
        }
        
        // Metodo que muestra la informacion de la clase Cliente
        public function __toString(){
            return "Nombre del cliente:\n".$this->getNombreCliente()."\n".
                    "Apellido del cliente:\n".$this->getApellidoCliente()."\n".
                    "Dado de baja:\n".$this->mostrarBaja()."\n". 
                    "Tipo de documento:\n".$this->getTipoDocumento()."\n".
                    "Documento del cliente:\n".$this->getDocumentoCliente()."\n";
        }

        // Metdo que retorna un mensaje de acuerdo a si el cliente esta o no dado de baja
        public function mostrarBaja(){
            $estadoBaja = $this->getDadoBaja();
            if($estadoBaja){
                $mensaje = "Si";
            }else{
                $mensaje = "No";
            }
            return $mensaje;
        }
    }

