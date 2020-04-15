<?php

namespace  Absabbath\FacturaDigital\Lib;

class FacturaConcepto
{
    
    private $ClaveProdServ;
    private $NoIdentificacion;
    private $Cantidad=0;
    private $ClaveUnidad;
    private $Unidad;
    private $Descripcion;
    private $ValorUnitario=0;
    private $Importe;
    private $Descuento;
    private $data;
    private $traslado;
    private $CalculoManual = false;
    private $Traslados = [];

    private $tipo = 'F';


    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
        return $this;
    }
    

    public function addTraslado($traslado){
        array_push($this->Traslados, $traslado);
    }

    /**
     * @return mixed
     */
    public function getClaveProdServ()
    {
        return $this->ClaveProdServ;
    }

    /**
     * @param mixed $ClaveProdServ
     *
     * @return self
     */
    public function setClaveProdServ($ClaveProdServ)
    {
        $this->ClaveProdServ = $ClaveProdServ;
        $this->data['ClaveProdServ'] = $ClaveProdServ;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoIdentificacion()
    {
        return $this->NoIdentificacion;
    }

    /**
     * @param mixed $NoIdentificacion
     *
     * @return self
     */
    public function setNoIdentificacion($NoIdentificacion)
    {
        $this->NoIdentificacion = $NoIdentificacion;
        $this->data['NoIdentificacion'] = $NoIdentificacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->Cantidad;
    }

    /**
     * @param mixed $Cantidad
     *
     * @return self
     */
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;
        $this->data['Cantidad'] = number_format($Cantidad, 0, '.', '');
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClaveUnidad()
    {
        return $this->ClaveUnidad;
    }

    /**
     * @param mixed $ClaveUnidad
     *
     * @return self
     */
    public function setClaveUnidad($ClaveUnidad)
    {
        $this->ClaveUnidad = $ClaveUnidad;
        $this->data['ClaveUnidad'] = $ClaveUnidad;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnidad()
    {
        return $this->Unidad;
    }

    /**
     * @param mixed $Unidad
     *
     * @return self
     */
    public function setUnidad($Unidad)
    {
        $this->Unidad = $Unidad;
        $this->data['Unidad'] = $Unidad;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param mixed $Descripcion
     *
     * @return self
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
        $this->data['Descripcion'] = $Descripcion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValorUnitario()
    {
        return $this->ValorUnitario;
    }

    /**
     * @param mixed $ValorUnitario
     *
     * @return self
     */
    public function setValorUnitario($ValorUnitario)
    {
        $this->ValorUnitario = $ValorUnitario;
        $this->Importe = $this->Cantidad * $this->ValorUnitario;
        $this->data['ValorUnitario'] = number_format($ValorUnitario, 2, '.', '');
        $this->data['Importe'] = number_format($this->Importe, 2, '.', '');
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImporte()
    {
        return $this->Importe;
    }

    /**
     * @param mixed $Importe
     *
     * @return self
     */
    public function setImporte($Importe)
    {
        $this->Importe = $Importe;
        $this->data['Importe'] = number_format($Importe, 2, '.', '');
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

    

    public function __toString()
    {
        return (array)$this;
    }

    public function getData()
    {
        if($this->tipo=='F'){
            $data = array_merge($this->data, [
                'Impuestos'=>[
                    'Traslados'=> $this->Traslados
                ]
            ]);
        }else{
            $data = $this->data;
        }
        return $data;
    }

    /**
     * @return mixed
     */
    public function getCalculoManual()
    {
        return $this->CalculoManual;
    }

    /**
     * @param boolean $CalculoManual
     *
     * @return self
     */
    public function setCalculoManual($CalculoManual)
    {
        $this->CalculoManual = $CalculoManual;
        return $this;
    }

    public function precioSinIva($precioConIva)
    {
        $data = [];
        $precioSin = $precioConIva / 1.16;

        return $precioSin;
    }




}
