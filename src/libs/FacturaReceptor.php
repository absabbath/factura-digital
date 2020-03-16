<?php

namespace  Absabbath\FacturaDigital\Lib;

class FacturaReceptor
{
	
	private $Rfc;
    private $Nombre;
    private $NumRegIdTrib;
    private $UsoCFDI;
    private $Calle;
    private $NoExt;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $Pais;
    private $CodigoPostal;
    private $data;

   

    public function getData()
    {
    	return $this->data;
    }


    /**
     * @return mixed
     */
    public function getRfc()
    {
        return $this->Rfc;
    }

    /**
     * @param mixed $Rfc
     *
     * @return self
     */
    public function setRfc($Rfc)
    {
        $this->Rfc = $Rfc;
        $this->data['Rfc'] = $Rfc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     *
     * @return self
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
        $this->data['Nombre'] = $Nombre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumRegIdTrib()
    {
        return $this->NumRegIdTrib;
    }

    /**
     * @param mixed $NumRegIdTrib
     *
     * @return self
     */
    public function setNumRegIdTrib($NumRegIdTrib)
    {
        $this->NumRegIdTrib = $NumRegIdTrib;
        $this->data['NumRegIdTrib'] = $NumRegIdTrib;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsoCFDI()
    {
        return $this->UsoCFDI;
    }

    /**
     * @param mixed $UsoCFDI
     *
     * @return self
     */
    public function setUsoCFDI($UsoCFDI)
    {
        $this->UsoCFDI = $UsoCFDI;
        $this->data['UsoCFDI'] = $UsoCFDI;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->Calle;
    }

    /**
     * @param mixed $Calle
     *
     * @return self
     */
    public function setCalle($Calle)
    {
        $this->Calle = $Calle;
        $this->data['Calle'] = $Calle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoExt()
    {
        return $this->NoExt;
    }

    /**
     * @param mixed $NoExt
     *
     * @return self
     */
    public function setNoExt($NoExt)
    {
        $this->NoExt = $NoExt;
        $this->data['NoExt'] = $NoExt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColonia()
    {
        return $this->Colonia;
    }

    /**
     * @param mixed $Colonia
     *
     * @return self
     */
    public function setColonia($Colonia)
    {
        $this->Colonia = $Colonia;
        $this->data['Colonia'] = $Colonia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->Municipio;
    }

    /**
     * @param mixed $Municipio
     *
     * @return self
     */
    public function setMunicipio($Municipio)
    {
        $this->Municipio = $Municipio;
        $this->data['Municipio'] = $Municipio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     *
     * @return self
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
        $this->data['Estado'] = $Estado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPais()
    {
        return $this->Pais;
    }

    /**
     * @param mixed $Pais
     *
     * @return self
     */
    public function setPais($Pais)
    {
        $this->Pais = $Pais;
        $this->data['Pais'] = $Pais;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoPostal()
    {
        return $this->CodigoPostal;
    }

    /**
     * @param mixed $CodigoPostal
     *
     * @return self
     */
    public function setCodigoPostal($CodigoPostal)
    {
        $this->CodigoPostal = $CodigoPostal;
        $this->data['CodigoPostal'] = $CodigoPostal;
        return $this;
    }
}
