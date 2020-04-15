<?php

namespace  Absabbath\FacturaDigital\Lib;

class Complemento
{
    private $Pagos;
   
    private $data;

    public function getData()
    {
    	return $this->data;
    }

   

    /**
     * @return mixed
     */
    public function getPagos()
    {
        return $this->Pagos;
    }

    /**
     * @param mixed $Pagos
     *
     * @return self
     */
    public function setPagos($Pagos)
    {
        $this->Pagos = $Pagos;
        $this->data['Pagos'] = $Pagos;
        return $this;
    }

}
