<?php

namespace  Absabbath\FacturaDigital\Lib;

class FacturaConceptoLista
{
    private $conceptos;
	
    /**
     * List of items.
     *
     * @param \PayPal\Api\Item[] $items
     * 
     * @return $this
     */
    public function setConceptos($conceptos)
    {
        $this->conceptos = $conceptos;
        return $this;
    }

    public function getTotalImpuestos()
    {
        $total = 0;

        foreach ($this->conceptos as $concepto) {
            foreach($concepto['Impuestos']['Traslados'] as $tax){
                $total = $total + $tax['Importe'];
            }
        }

        return $total;
    }

    public function getTotalConceptos()
    {
        $total = 0;
        $totalImpuestos = $this->getTotalImpuestos();

        foreach ($this->conceptos as $concepto) {
            $total = $total + $concepto['Importe'];
        }

        return ['totalConceptos' => $total, 'totalImpuestos' => $totalImpuestos];
    }

    /**
     * List of items.
     *
     * @return \PayPal\Api\Item[]
     */
    public function getData()
    {
        return $this->conceptos;
    }

    /**
     * Append Items to the list.
     *
     * @param \PayPal\Api\Item $item
     * @return $this
     */
    public function addConcepto($concepto)
    {
        if (!$this->getData()) {
            return $this->setConceptos(array($concepto));
        } else {
            return $this->setConceptos(
                array_merge($this->getData(), array($concepto))
            );
        }
    }
	

}
