<?php 
include_once 'Cliente.php';
include_once 'Moto.php'; 
include_once 'Venta.php'; 
include_once 'Empresa.php';


//1)
$objCliente1 = new Cliente("Marcelo","Gallardo",false,"dni",90784623);
$objCliente2 = new Cliente("Enzo","Francescoli",false,"dni",78821624);

//2)
$objMoto1 = new Moto(11,2230000,2022,"Benelli Imperiale 400",85,true);
$objMoto2 = new Moto(12,584000,2021,"Zanella Zr 150 Ohc",70,true);
$objMoto3 = new Moto(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);


//4)
$objEmpresa = new Empresa("Alta Gama","Av Argenetina 123",[$objCliente1,$objCliente2],[$objMoto1,$objMoto2,$objMoto3],[]);

//5)
$importe =$objEmpresa->registrarVenta([11,12,13],$objCliente2);
echo "Punto 5),el importe es $".$importe."\n";

//6)
$importe2 = $objEmpresa->registrarVenta([0],$objCliente2);
echo "Punto 6), el importe es $".$importe2."\n";

//7)
$importe3 = $objEmpresa->registrarVenta([2],$objCliente2);
echo "Punto 7), el importe es $".$importe3."\n";

//8)
$tipoDoc1 = $objCliente1->getTipoDocumento();
$numDoc1 = $objCliente1->getDocumentoCliente();
$ventasCliente1 = $objEmpresa->retornarVentasXCliente($tipoDoc1,$numDoc1);
echo "8) ".mostrarVentas($ventasCliente1);

//9)
$tipoDoc2 = $objCliente2->getTipoDocumento();
$numDoc2 = $objCliente2->getDocumentoCliente();
$ventasCliente2 = $objEmpresa->retornarVentasXCliente($tipoDoc2,$numDoc2);
echo "9) ".mostrarVentas($ventasCliente2)."\n";

//10)
echo $objEmpresa->__toString();

// Metodo que  recorre y  muestra las ventas
function mostrarVentas($ventas){
    if($ventas == null){
        $mensaje = "La venta es nula\n";
    }else{
        $mensaje = "Las ventas del cliente:\n";
        for($i=0;$i<count($ventas);$i++){
            $mensaje= $mensaje.$ventas[$i]."\n";
        }
    }
    return $mensaje;
}




