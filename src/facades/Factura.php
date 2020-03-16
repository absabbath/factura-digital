<?php

namespace  Absabbath\FacturaDigital\Facades;

use Illuminate\Support\Facades\Facade;

class Factura extends Facade
{
	protected static function getFacadeAccessor()
	{
		return "factura-digital";
	}
	
}
