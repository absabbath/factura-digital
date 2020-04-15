<?php

namespace Absabbath\FacturaDigital;

use Illuminate\Support\ServiceProvider;
use Absabbath\FacturaDigital\Lib\Factura;
use Absabbath\FacturaDigital\Lib\FacturaConcepto;
use Absabbath\FacturaDigital\Lib\FacturaConceptoLista;
use Absabbath\FacturaDigital\Lib\FacturaReceptor;
use Absabbath\FacturaDigital\Lib\FacturaImpuesto;
use Absabbath\FacturaDigital\Lib\FacturaEmisor;
use Absabbath\FacturaDigital\Lib\ConceptoImpuesto;
use Absabbath\FacturaDigital\Lib\Complemento;
use Absabbath\FacturaDigital\Lib\Pago;
use Absabbath\FacturaDigital\Lib\DoctoRelacionado;


class FacturaDigitalProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('factura-digital', function ()
        {
            return new Factura(
                new FacturaConcepto(), 
                new FacturaConceptoLista(), 
                new FacturaReceptor(), 
                new FacturaImpuesto(), 
                new FacturaEmisor(),
                new ConceptoImpuesto(),
                new Complemento(),
                new Pago(),
                new DoctoRelacionado()
            );
        });
    }
}
