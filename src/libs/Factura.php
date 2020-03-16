<?php

namespace  Absabbath\FacturaDigital\Lib;

use GuzzleHttp\Client as GuzzleClient;

class Factura
{

	private $concepto;
	private $listaConceptos;
	private $receptor;
	private $impuesto;
	private $emisor;

	private $Serie;
    private $Observaciones;
	private $Folio;
	private $Fecha;
	private $FormaPago;
	private $CondicionesDePago;
	private $SubTotal;
	private $Descuento;
	private $Moneda;
	private $TipoCambio;
	private $Total;
	private $TipoDeComprobante;
	private $MetodoPago;
	private $LugarExpedicion;
	private $LeyendaFolio;
    private $conceptoImpuesto;

	private $data;

	public function __construct(
		FacturaConcepto $concepto, 
		FacturaConceptoLista $listaConceptos, 
		FacturaReceptor $receptor, 
		FacturaImpuesto $impuesto,
		FacturaEmisor $emisor,
        ConceptoImpuesto $conceptoImpuesto
    )
	{
		$this->concepto = $concepto;
		$this->listaConceptos = $listaConceptos;
		$this->receptor = $receptor;
		$this->impuesto = $impuesto;
		$this->emisor = $emisor;
        $this->conceptoImpuesto = $conceptoImpuesto;
	}


    /**
     * @var FacturaConcepto $concepto
     */
    
    public function concepto()
    {
    	return $this->concepto;
    }

    public function conceptoImpuesto()
    {
        return $this->conceptoImpuesto;
    }


    /**
     * @var FacturaConceptoLista $listaConceptos
     */
    public function listaConceptos()
    {
    	return $this->listaConceptos;
    }


    /**
     * @var FacturaReceptor $receptor
     */
    public function receptor()
    {
    	return $this->receptor;
    }


    /**
     * @var FacturaImpuesto $impuesto
     */
    public function impuesto()
    {
    	return $this->impuesto;
    }


     /**
     * @var FacturaEmisor $emisro
     */
     public function emisor()
     {
     	return $this->emisor;
     }



	/**
	 * Consulta el numero de creditos restantes
	 * @return @array [mensaje, creditos, codigo] respuesta de la api
	 */
	public function creditos()
	{
		
		$client = new GuzzleClient();
		$res = $client->request('POST', $this->base_url().'/cfdi/creditos', [
			'headers' => $this->credenciales()
		]);

		$respuesta = $res->getBody()->getContents();
		$data = json_decode($respuesta, true);

		return $data;
	}

    /**
     * Genera la factura obteniendo los datos capturados
     * @return array Devuelve ligas de la factura e identificador
     */
	public function enviar()
	{
		$res = null;
        $data_cfdi = [];

		try {

			$data = $this->getData();
            $part_headers = ['Accept' => 'application/json', 'jsoncfdi' =>  json_encode($data) ];
			$headers = array_merge( $this->credenciales(), $part_headers);

			$randomkey = rand(5, 9999999999999999);


			$client = new GuzzleClient();
			$res = $client->request('POST', $this->base_url().'/cfdi/generar/'.$randomkey, [
				'headers' => $headers
			]);

			if ($res) {
				$respuesta = $res->getBody()->getContents();
                $data = json_decode($respuesta, true);
                $data_cfdi = $data;
			} else {
				return "Error api";
			}

		} catch (\GuzzleHttp\Exception\ClientException $e) {
			 //dd($e->getResponse()->getBody()->getContents());
             $error = json_decode($e->getResponse()->getBody()->getContents());
             $error = (array)$error;
             $data_cfdi = $error;
		}

        return $data_cfdi;
	}

    /**
     * enviarCorreo Envia la factura al correo indicado
     * @param  string $uuid         identificador de la factura enviar
     * @param  string $destinatario correo del receptor de la factura
     * @return boolean               Devuelve verdadero si la transaccion fue existosa
     */
    public function enviarCorreo($uuid, $destinatario, $mensaje)
    {   
        $res = null;
        $data_cfdi = [];
        $response = false;
        try {

            $part_headers = [
                    'Accept' => 'application/json', 
                    'uuid'=> $uuid,
                    'destinatario' => $destinatario,
                    'mensaje' => $mensaje 
                ];

            $headers = array_merge( $this->credenciales(), $part_headers);

            $client = new GuzzleClient();
            $res = $client->request('POST', $this->base_url().'/cfdi/correo', [
                'headers' => $headers
            ]);

            if ($res) {
                $respuesta = $res->getBody()->getContents();
                //dd($respuesta);
                $data = json_decode($respuesta, true);
                $response = true;
                $data_cfdi = $data;
            } else {
                return "Error api";
            }

        } catch (\GuzzleHttp\Exception\ClientException $e) {
             //dd($e->getResponse()->getBody()->getContents());
             $error = json_decode($e->getResponse()->getBody()->getContents());
             $error = (array)$error;
             $data_cfdi = $error;
        }

        return $response;
        
    }

    /**
     * Cancela cfdis
     * @param  string $uuid Identificador de la factura
     * @return array       respuesta de la cancelacion $array['mensaje']
     */
    public function cancelarCFDI($uuid)
    {   
        $res = null;
        $data_cfdi = [];
        try {

            $part_headers = [
                    'Accept' => 'application/json', 
                    'uuid'=> $uuid,
                ];

            $headers = array_merge( $this->credenciales(), $part_headers);

            $client = new GuzzleClient();
            $res = $client->request('POST', $this->base_url().'/cfdi/cancelar', [
                'headers' => $headers
            ]);

            if ($res) {
                $respuesta = $res->getBody()->getContents();
                //dd($respuesta);
                $data = json_decode($respuesta, true);
                //dd($data);
                $data_cfdi = $data;
            } else {
                return "Error api";
            }

        } catch (\GuzzleHttp\Exception\ClientException $e) {
             //dd($e->getResponse()->getBody()->getContents());
             $error = json_decode($e->getResponse()->getBody()->getContents());
             $error = (array)$error;
             $data_cfdi = $error;
        }

        //dd($data_cfdi);

        return $data_cfdi;
        
    }


	/**
	 * Obtiene la url base de la api
	 * @return @string URL
	 */
	protected function base_url()
	{
		$url_base = 'http://app.facturadigital.com.mx/api';

		return $url_base ;
	}


	/**
	 * Obtiene las cebeceras necerarias para el inicio de sesion
	 * @return @array con usuario y contraseña
	 */
	protected function credenciales()
	{
		$headers = array('api-usuario' 	=> $this->emisor->getUser(), 
			'api-password' => $this->emisor->getPassword());

		return $headers;
	}

    public function precioSinIva($precioConIva)
    {
        $data = [];
        $precioSin = ($precioConIva * 100) / 116;
        $iva = $precioSin * 0.16000;

        $data = ['precioSin' => $precioSin, 'iva' => $iva];


        return $data;
    }

	/**
	 * Devuelve el arreglo con los datos correctos
	 * @return Array
	 */
	public function getData()
	{
		return $this->data;
	}

    /**
     * @return mixed
     */
    public function getSerie()
    {
    	return $this->Serie;
    }

    /**
     * @param mixed $Serie
     *
     * @return self
     */
    public function setSerie($Serie)
    {
    	$this->Serie = $Serie;
    	$this->data['Serie'] = $Serie;
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->Observaciones;
    }

    /**
     * @param mixed $Serie
     *
     * @return self
     */
    public function setObservaciones($Observaciones)
    {
        $this->Observaciones = $Observaciones;
        $this->data['Observaciones'] = $Observaciones;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFolio()
    {
    	return $this->Folio;
    }

    /**
     * @param mixed $Folio
     *
     * @return self
     */
    public function setFolio($Folio)
    {
    	$this->Folio = $Folio;
    	$this->data['Folio'] = $Folio;
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
    	return $this->Fecha;
    }

    /**
     * @param mixed $Fecha
     *
     * @return self
     */
    public function setFecha($Fecha)
    {
    	$this->Fecha = $Fecha;
    	$this->data['Fecha'] = $Fecha;
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getFormaPago()
    {
    	return $this->FormaPago;
    }

    /**
     * @param mixed $FormaPago
     *
     * @return self
     */
    public function setFormaPago($FormaPago)
    {
    	$this->FormaPago = $FormaPago;
    	$this->data['FormaPago'] = $FormaPago;
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCondicionesDePago()
    {
    	return $this->CondicionesDePago;
    }

    /**
     * @param mixed $CondicionesDePago
     *
     * @return self
     */
    public function setCondicionesDePago($CondicionesDePago)
    {
    	$this->CondicionesDePago = $CondicionesDePago;
    	$this->data['CondicionesDePago'] = $CondicionesDePago;
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getSubTotal()
    {
    	return $this->SubTotal;
    }

    /**
     * @param mixed $SubTotal
     *
     * @return self
     */
    public function setSubTotal($SubTotal)
    {
    	$this->SubTotal = $SubTotal;
    	$this->data['SubTotal'] = number_format($SubTotal, 2, '.', '');
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getDescuento()
    {
    	return $this->Descuento;
    }

    /**
     * @param mixed $Descuento
     *
     * @return self
     */
    public function setDescuento($Descuento)
    {
    	$this->Descuento = $Descuento;
    	$this->data['Descuento'] = number_format($Descuento, 2, '.', '');
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getMoneda()
    {
    	return $this->Moneda;
    }

    /**
     * @param mixed $Moneda
     *
     * @return self
     */
    public function setMoneda($Moneda)
    {
    	$this->Moneda = $Moneda;
    	$this->data['Moneda'] = $Moneda;
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoCambio()
    {
    	return $this->TipoCambio;
    }

    /**
     * @param mixed $TipoCambio
     *
     * @return self
     */
    public function setTipoCambio($TipoCambio)
    {
    	$this->TipoCambio = $TipoCambio;
    	$this->data['TipoCambio'] = $TipoCambio;
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
    	return $this->Total;
    }

    /**
     * @param mixed $Total
     *
     * @return self
     */
    public function setTotal($Total)
    {
    	$this->Total = $Total;
    	$this->data['Total'] = number_format($Total, 2, '.', '');
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoDeComprobante()
    {
    	return $this->TipoDeComprobante;
    }

    /**
     * @param mixed $TipoDeComprobante
     *
     * @return self
     */
    public function setTipoDeComprobante($TipoDeComprobante)
    {
    	$this->TipoDeComprobante = $TipoDeComprobante;
    	$this->data['TipoDeComprobante'] = $TipoDeComprobante;
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getMetodoPago()
    {
    	return $this->MetodoPago;
    }

    /**
     * @param mixed $MetodoPago
     *
     * @return self
     */
    public function setMetodoPago($MetodoPago)
    {
    	$this->MetodoPago = $MetodoPago;
    	$this->data['MetodoPago'] = $MetodoPago;
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getLugarExpedicion()
    {
    	return $this->LugarExpedicion;
    }

    /**
     * @param mixed $LugarExpedicion
     *
     * @return self
     */
    public function setLugarExpedicion($LugarExpedicion)
    {
    	$this->LugarExpedicion = $LugarExpedicion;
    	$this->data['LugarExpedicion'] = $LugarExpedicion;
    	return $this;
    }

    /**
     * @return mixed
     */
    public function getLeyendaFolio()
    {
    	return $this->LeyendaFolio;
    }

    /**
     * @param mixed $LeyendaFolio
     *
     * @return self
     */
    public function setLeyendaFolio($LeyendaFolio)
    {
    	$this->LeyendaFolio = $LeyendaFolio;
    	$this->data['LeyendaFolio'] = $LeyendaFolio;
    	return $this;
    }

    public function setReceptor($receptor)
    {
    	$this->data['Receptor'] = $receptor;
    }

    public function setConceptos($conceptos)
    {
    	$this->data['Conceptos'] = $conceptos;
    }

    public function setImpuestos($impuestos)
    {
    	$this->data['Impuestos'] = $impuestos;
    }

    public function setEmisor($emisor)
    {
    	$this->data['Emisor'] = $emisor;
    }

}
