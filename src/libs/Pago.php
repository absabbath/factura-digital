<?php

namespace  Absabbath\FacturaDigital\Lib;

class Pago{

    private $data;
    private $traslados;
    private $retenciones;

    private $FechaPago; // ver Fecha Pago
    private $FormaDePagoP;  // ver catálogo  c_FormaPago
    private $MonedaP;
    private $TipoCambioP; // opcional
    private $Monto;
    private $NumOperacion; // opcional
    private $RfcEmisorCtaOrd; // opcional
    private $NomBancoOrdExt; // opcional
    private $CtaOrdenante; // opcional
    private $RfcEmisorCtaBen; // opcional
    private $CtaBeneficiario; // opcional
    private $TipoCadPago; // opcional
    private $CertPago; // opcional
    private $CadPago; // opcional
    private $SelloPago; // opcional
    private $DoctoRelacionado;

    private $TotalImpuestosRetenidos;
    private $TotalImpuestosTrasladados;

    public function __toString(){
        return (array)$this;
    }

    public function getData(){
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getFechaPago(){
        return $this->FechaPago;
    }
    /**
     * @param mixed $FechaPago
     *
     * @return self
     */

    public function setFechaPago($FechaPago){
        $this->FechaPago = $FechaPago;
        $this->data['FechaPago'] = $FechaPago;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getFormaDePagoP(){
        return $this->FormaDePagoP;
    }
    /**
     * @param mixed $FormaDePagoP
     *
     * @return self
     */
    public function setFormaDePagoP($FormaDePagoP){
        $this->FormaDePagoP = $FormaDePagoP;
        $this->data['FormaDePagoP'] = $FormaDePagoP;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMonedaP(){
        return $this->MonedaP;
    }

    /**
     * @param mixed $MonedaP
     *
     * @return self
     */
    public function setMonedaP($MonedaP){
        $this->MonedaP = $MonedaP;
        $this->data['MonedaP'] = $MonedaP;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoCambioP(){
        return $this->ClaveUnidad;
    }

    /**
     * @param mixed $TipoCambioP
     *
     * @return self
     */
    public function setTipoCambioP($TipoCambioP){
        $this->TipoCambioP = $TipoCambioP;
        $this->data['TipoCambioP'] = $TipoCambioP;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMonto(){
        return $this->Monto;
    }

    /**
     * @param mixed $Monto
     *
     * @return self
     */
    public function setMonto($Monto){
        $this->Monto = $Monto;
        $this->data['Monto'] = $Monto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumOperacion(){
        return $this->NumOperacion;
    }

    /**
     * @param mixed $NumOperacion
     *
     * @return self
     */
    public function setNumOperacion($NumOperacion){
        $this->NumOperacion = $NumOperacion;
        $this->data['NumOperacion'] = $NumOperacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRfcEmisorCtaOrd()
    {
        return $this->RfcEmisorCtaOrd;
    }

    /**
     * @param mixed $RfcEmisorCtaOrd
     *
     * @return self
     */
    public function setRfcEmisorCtaOrd($RfcEmisorCtaOrd){
        $this->RfcEmisorCtaOrd = $RfcEmisorCtaOrd;
        $this->data['RfcEmisorCtaOrd'] = $RfcEmisorCtaOrd;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomBancoOrdExt()
    {
        return $this->NomBancoOrdExt;
    }

    /**
     * @param mixed $NomBancoOrdExt
     *
     * @return self
     */
    public function setNomBancoOrdExt($NomBancoOrdExt){
        $this->NomBancoOrdExt = $NomBancoOrdExt;
        $this->data['NomBancoOrdExt'] = $NomBancoOrdExt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCtaOrdenante(){
        return $this->CtaOrdenante;
    }

    /**
     * @param mixed $CtaOrdenante
     *
     * @return self
     */
    public function setCtaOrdenante($CtaOrdenante){
        $this->CtaOrdenante = $CtaOrdenante;
        $this->data['CtaOrdenante'] = $CtaOrdenante;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRfcEmisorCtaBen(){
        return $this->RfcEmisorCtaBen;
    }

    /**
     * @param mixed $Base
     *
     * @return self
     */
    public function setRfcEmisorCtaBen($RfcEmisorCtaBen){
        $this->RfcEmisorCtaBen = $Base;
        $this->data['RfcEmisorCtaBen'] = $RfcEmisorCtaBen;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCtaBeneficiario()
    {
        return $this->CtaBeneficiario;
    }

    /**
     * @param mixed $CtaBeneficiario
     *
     * @return self
     */
    public function setCtaBeneficiario($CtaBeneficiario){
        $this->CtaBeneficiario = $CtaBeneficiario;
        $this->data['CtaBeneficiario'] = $CtaBeneficiario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoCadPago(){
        return $this->TipoCadPago;
    }

    /**
     * @param mixed $TipoCadPago
     *
     * @return self
     */
    public function setTipoCadPago($TipoCadPago){
        $this->TipoCadPago = $TipoCadPago;
        $this->data['TipoCadPago'] = $TipoCadPago;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCertPago(){
        return $this->CertPago;
    }

    /**
     * @param mixed $CertPago
     *
     * @return self
     */
    public function setCertPago($CertPago){
        $this->CertPago = $CertPago;
        $this->data['CertPago'] = $CertPago;
        return $this;
    }

     /**
     * @return mixed
     */
    public function getCadPago(){
        return $this->CadPago;
    }

    /**
     * @param mixed $CadPago
     *
     * @return self
     */
    public function setCadPago($CadPago){
        $this->CadPago = $CadPago;
        $this->data['CadPago'] = $CadPago;
        return $this;
    }

    public function getSelloPago(){
        return $this->SelloPago;
    }

    public function setSelloPago($SelloPago){
        $this->SelloPago = $SelloPago;
        $this->data['SelloPago'] = $SelloPago;
        return $this;
    }

    public function getDoctoRelacionados(){
        return $this->DoctoRelacionados;
    }

    public function setDoctoRelacionado($DoctoRelacionado){
        $this->DoctoRelacionado = $DoctoRelacionado;
        $this->data['DoctoRelacionado'] = $DoctoRelacionado;
        return $this;
    }
    /*     Totales    */
    public function getTotalImpuestosRetenidos(){
        return $this->TotalImpuestosRetenidos;
    }

    public function setTotalImpuestosRetenidos($TotalImpuestosRetenidos){
        $this->TotalImpuestosRetenidos = $TotalImpuestosRetenidos;
        return $this;
    }

    public function getTotalImpuestosTraslados(){
        return $this->TotalImpuestosTraslados;
    }

    public function setTotalImpuestosTraslados($TotalImpuestosTrasladados){
        $this->TotalImpuestosTrasladados = $TotalImpuestosTrasladados;
        return $this;
    }
    /*     Trasladados    */
    public function getTraslados(){
        return $this->traslados;
    }

    public function setTraslados($traslados){
        $this->traslados = $traslados;
        return $this;
    }
    /*     Retenciones    */
    public function getRetenciones(){
        return $this->retenciones;
    }

    public function setRetenciones($retenciones){
        $this->retenciones = $retenciones;
        return $this;
    }

}
