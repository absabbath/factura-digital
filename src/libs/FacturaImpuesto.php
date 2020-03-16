<?php

namespace  Absabbath\FacturaDigital\Lib;

class FacturaImpuesto
{
    private $TotalImpuestosTrasladados;
    private $data;
    private $traslados;

    public function getData()
    {
        return $this->data;
    }


    /**
     * @return mixed
     */
    public function getTotalImpuestosTrasladados()
    {
        return $this->TotalImpuestosTrasladados;
    }

    /**
     * @param mixed $TotalImpuestosTrasladados
     *
     * @return self
     */
    public function setTotalImpuestosTrasladados($TotalImpuestosTrasladados)
    {
        $this->TotalImpuestosTrasladados = $TotalImpuestosTrasladados;
        $this->data['TotalImpuestosTrasladados'] = number_format($TotalImpuestosTrasladados, 2, '.', '');
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTraslados()
    {
        return $this->traslados;
    }

    /**
     * @param mixed $traslados
     *
     * @return self
     */
    public function setTraslados($traslados)
    {
        $total = 0;
        foreach ($traslados as $traslado) {
            $total += $traslado['Importe'];
        }
        $this->setTotalImpuestosTrasladados($total);
        $this->traslados = $traslados;
        $this->data['Traslados'] = $traslados;
        return $this;
    }

    
}
