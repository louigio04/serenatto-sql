<?php

namespace Drewlabs\Dompdf;

interface FactoryInterface
{
    /**
     * creates the instance of the DomPfable interface
     * 
     * @param array $options
     * 
     * @return DomPdfable
     */
    public function create($options = []);
}