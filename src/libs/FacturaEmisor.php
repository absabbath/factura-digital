<?php

namespace  Absabbath\FacturaDigital\Lib;

class FacturaEmisor
{
    private $RegimenFiscal;

    private $user;

    private $password;
   
    private $data;

    public function getData()
    {
    	return $this->data;
    }

    /**
     * @return mixed
     */
    public function getRegimenFiscal()
    {
        return $this->RegimenFiscal;
    }

    /**
     * @param mixed $RegimenFiscal
     *
     * @return self
     */
    public function setRegimenFiscal($RegimenFiscal)
    {
        $this->RegimenFiscal = $RegimenFiscal;
        $this->data['RegimenFiscal'] = $RegimenFiscal;
        return $this;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }



}
