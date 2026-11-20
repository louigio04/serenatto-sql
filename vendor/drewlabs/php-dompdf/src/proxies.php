<?php

namespace Drewlabs\Dompdf\Proxy;

use Drewlabs\Dompdf\Dompdf;
use Drewlabs\Dompdf\Factory;
use Drewlabs\Dompdf\PathPrefixer;
use Drewlabs\Dompdf\FactoryInterface;
use Drewlabs\Dompdf\DomPdfable;
use Psr\Http\Message\StreamInterface;

/**
 * Proxy function to an instance of {@see PathPrefixer}
 * 
 * @param string $base 
 * @return PathPrefixer 
 */
function PathPrefixer(string $base)
{
    return new PathPrefixer($base);
}

/**
 * Proxy function to an instance of {@see PdfFactory}
 * 
 * @return FactoryInterface 
 */
function PdfFactory()
{
    return new Factory();
}

/**
 * Proxy function to an instance of {@see DomPdfable}
 * 
 * @param array|\Closure|string $options 
 * @param string|\SplFileInfo|StreamInterface $stream
 * 
 * @return DomPdf 
 */
function DomPdf($options = [], $stream = null)
{
    if (is_string($options)) {
        $stream = $options;
        $options = require __DIR__ . '/../default.php';
    }

    if (empty($options)) {
        $options = require __DIR__ . '/../default.php';
    }

    $pdf = DomPdf::new($options);
    if (null !== $stream) {
        $pdf = $pdf->read($stream);
    }
    
    return $pdf;
}