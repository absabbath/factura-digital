# Libreria facturación electrónica

  **absabbath/factura-digital** es una libreria para consumir la api de [https://www.facturadigital.com.mx/](https://www.facturadigital.com.mx/) en un proyecto de Laravel

# Instalación

- Correr el siguiente comando en la terminal

```bash
$ composer require absabbath/factura-digital
```


- Agregar la siguiente linea al arreglo de provider en el archivo configuracion en config/app.php

**Absabbath\FacturaDigital\FacturaDigitalProvider::class,**

- Agregar la siguiente linea al arreglo de aliases en el archivo configuracion en config/app.php

**'FacturaDigital' => Absabbath\FacturaDigital\Facades\Factura::class,**


# Como utilizar la libreria:

- Configurar credenciales y regimen del emisor

```php
$emisor = \FacturaDigital::emisor()
	->setRegimenFiscal('612')
	->setUser('demo33')
    ->setPassword('demo')
	->getData();
```

- Consultar creditos

```php
$creditos =  \FacturaDigital::creditos()
```

- Retorna :

```json
{
    "mensaje":  "11565 creditos disponibles.",
    "creditos":  11565,
    "codigo":  200
}
```

- Configurar la información del receptor

```php			
$receptor = FacturaDigital::receptor()
	->setRfc('NDI120326HF5')
	->setNombre('Novatech Digital SA de CV')
	//->setNumRegIdTrib('')
	->setUsoCFDI('G03')
	->setCalle('Palmas')
	->setNoExt('129')
	->setColonia('Centro')
	->setMunicipio('Guadalupe')
	->setEstado('Nuevo León')
	->setPais('Mexico')
	->setCodigoPostal('98000')
	->getData();
```

- Registrar los conceptos de la factura

```php
$concepto = \FacturaDigital::concepto()
            ->setClaveProdServ('01010101') // Agregar clave sat en catalogo productos
            ->setNoIdentificacion('1')  // Id interno
            ->setCantidad(5) // Cantidad a facturar
            ->setClaveUnidad('LTR') // Clave del SAT
            ->setUnidad('Litro') // Descripcion unidad
            ->setDescripcion('Descripcion/nombre del producto')
            ->setValorUnitario(30); // Costo por unidad
```

- Crear y agregar impuesto por cada concepto

```php
$impuestos = []; // Recolecta la informacion de todos los impuestos
$impuesto_iva = \FacturaDigital::conceptoImpuesto()
            ->setBase(30) // Base gravable
            ->setImpuesto('002')
            ->setTipoFactor('Tasa')
            ->setTasaOCuota(0.16000)
            ->setImporte(30 * 0.16000) // Base gravable X tasaocuota
            ->getData();
```

- Agregar los impuestos al concepto anterior y a la lista de impuestos

```php
array_push($impuestos, $impuesto_iva);
$concepto->addTraslado($impuesto_iva);
```

- Agregar la lista de conceptos a facturar y obtener los totales

```php
$lista = \FacturaDigital::listaConceptos();
$lista->addConcepto($concepto->getData());
```

- Obtener los totales (Impuestos y conceptos libres de impuestos)

```php
$totales = $lista->getTotalConceptos();
// retorna ['totalConceptos', 'totalImpuestos']
```

- Registrar datos generales de la factura

```php
$factura = FacturaDigital::setSerie('F')
	->setFolio('71278') // Folio Interno
	->setFecha('AUTO')
	->setFormaPago('01')// Catalogo SAT
	->setCondicionesDePago('Pago de contado')
	->setMoneda('MXN')
	->setTipoCambio('1')
	->setTipoDeComprobante('I')
	->setMetodoPago('PUE')
	->setLugarExpedicion('67150') //C.P.
	->setLeyendaFolio('Factura')
	->setSubTotal($totales['totalConceptos'])
	//->setDescuento('30.00') // Descuento opcional
	->setTotal($totales['totalConceptos'] + $totales['totalImpuestos'] );
```

- Agregar listado de los impuestos

```php
$impuestoFinal = \FacturaDigital::impuesto()
            ->setTraslados($impuestos);;
```

Agregar todos los datos a la factura

```php
$factura->setEmisor($emisor);
$factura->setReceptor($receptor);
$factura->setConceptos($lista->getData());
$factura->setImpuestos($impuestoFinal->getData());
```

Generar factura

```php
$factura_final = $factura->enviar();
```

- Retorna el siguiente arreglo

```json
{
  "mensaje":  "Timbrado exitoso",   
  "codigo":  200,  
  "cfdi":
      {
       "NoCertificado":  "",
       "UUID":  "",
       "FechaTimbrado":  "2018-06-28T16:33:27",
       "RfcProvCertif":  "FEL100622S88",
       "SelloCFD":"",
       "NoCertificadoSAT":  "20001000000300022323",
       "SelloSAT":  "",
       "CadenaOrigTFD":  "",
       "CadenaQR":  "",
       "XmlBase64":  "",
       "PDF":  "",
       "XML":  ""
      }
}
```

Enviar factura por correo

```php
$enviar = $factura->enviarCorreo($uuid, 'tucorreo@dominio.com', 'tu mensaje adicional');
```

- Esto retorna un booleano


```php
if ($enviar) {
	return "Factura enviada por correo";
} else {
	return "Errorsillo";
}
```

- Para cancelar un CFDI

```php
$cancela = $factura->cancelarCFDI('UUID');
```

> Fue probado en versiones de Laravel >= 5.1
