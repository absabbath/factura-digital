<?php

namespace  Absabbath\FacturaDigital\Lib;

class DoctoRelacionado{

    private $data;
   
    private $IdDocumento;
    private $Serie;
    private $Folio;
    private $MonedaDR; 
    private $TipoCambioDR;
    private $MetodoDePagoDR;
    private $NumParcialidad;
    private $ImpSaldoAnt; // ultimo saldo (antes de recibir este pago)
    private $ImpPagado;
    private $ImpSaldoInsoluto;

    public function __toString(){
        return (array)$this;
    }

    public function getData(){
        return $this->data;
    }

    public function getIdDocumento(){
        return $this->IdDocumento;
    }

    public function setIdDocumento($IdDocumento){

        $this->IdDocumento = $IdDocumento;
        $this->data['IdDocumento'] = $IdDocumento;
        return $this;
    }

    public function getSerie(){
        return $this->Serie;
    }

    public function setSerie($Serie){
        $this->Serie = $Serie;
        $this->data['Serie'] = $Serie;
        return $this;
    }

    public function getFolio(){
        return $this->Folio;
    }

    public function setFolio($Folio){
        $this->Folio = $Folio;
        $this->data['Folio'] = $Folio;
        return $this;
    }

    public function getMonedaDR(){
        return $this->MonedaDR;
    }

    public function setMonedaDR($MonedaDR){
        $this->MonedaDR = $MonedaDR;
        $this->data['MonedaDR'] = $MonedaDR;
        return $this;
    }

    public function getTipoCambioDR(){
        return $this->TipoCambioDR;
    }

    public function setTipoCambioDR($TipoCambioDR){
        $this->TipoCambioDR = $TipoCambioDR;
        $this->data['TipoCambioDR'] = $TipoCambioDR;
        return $this;
    }

    public function getMetodoDePagoDR(){
        return $this->MetodoDePagoDR;
    }

    public function setMetodoDePagoDR($MetodoDePagoDR){
        $this->MetodoDePagoDR = $MetodoDePagoDR;
        $this->data['MetodoDePagoDR'] = $MetodoDePagoDR;
        return $this;
    }

    public function getNumParcialidad(){
        return $this->NumParcialidad;
    }

    public function setNumParcialidad($NumParcialidad){
        $this->NumParcialidad = $NumParcialidad;
        $this->data['NumParcialidad'] = $NumParcialidad;
        return $this;
    }

    public function getImpSaldoAnt(){
        return $this->ImpSaldoAnt;
    }

    public function setImpSaldoAnt($ImpSaldoAnt){
        $this->ImpSaldoAnt = $ImpSaldoAnt;
        $this->data['ImpSaldoAnt'] = $ImpSaldoAnt;
        return $this;
    }

    public function getImpPagado(){
        return $this->ImpPagado;
    }

    public function setImpPagado($ImpPagado){
        $this->ImpPagado = $ImpPagado;
        $this->data['ImpPagado'] = $ImpPagado;
        return $this;
    }

    public function getImpSaldoInsoluto(){
        return $this->ImpSaldoInsoluto;
    }

    public function setImpSaldoInsoluto($ImpSaldoInsoluto){
        $this->ImpSaldoInsoluto = $ImpSaldoInsoluto;
        $this->data['ImpSaldoInsoluto'] = $ImpSaldoInsoluto;
        return $this;
    }
}