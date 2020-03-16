<?php

namespace  Absabbath\FacturaDigital\Lib;

class ConceptoImpuesto
{
	

	private $Impuesto;
	private $Base;
	private $TipoFactor;
	private $TasaOCuota;
	private $Importe;
	private $data;
    
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
    public function getBase()
    {
        return $this->Base;
    }

    /**
     * @param mixed $Base
     *
     * @return self
     */
    public function setBase($Base)
    {
        $this->Base = $Base;
        $this->data['Base'] = number_format($Base, 2, '.', '');
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImpuesto()
    {
        return $this->Impuesto;
    }

    /**
     * @param mixed $Impuesto
     *
     * @return self
     */
    public function setImpuesto($Impuesto)
    {
        $this->Impuesto = $Impuesto;
        $this->data['Impuesto'] = $Impuesto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoFactor()
    {
        return $this->TipoFactor;
    }

    /**
     * @param mixed $TipoFactor
     *
     * @return self
     */
    public function setTipoFactor($TipoFactor)
    {
        $this->TipoFactor = $TipoFactor;
        $this->data['TipoFactor'] = $TipoFactor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTasaOCuota()
    {
        return $this->TasaOCuota;
    }

    /**
     * @param mixed $TasaOCuota
     *
     * @return self
     */
    public function setTasaOCuota($TasaOCuota)
    {
        $this->TasaOCuota = $TasaOCuota;
        $this->data['TasaOCuota'] = number_format($TasaOCuota, 6, '.', '');
        return $this;
    }

    public function __toString()
    {
    	return (array)$this;
    }

    public function getData()
    {
        return $this->data;
    }

}
