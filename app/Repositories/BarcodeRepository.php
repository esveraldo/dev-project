<?php

namespace App\Repositories;

use Milon\Barcode\DNS1D;

class BarcodeRepository
{
    /**
     * Generate a Barcode in base64.
     *
     * @return string
     */
    public function generate($barcode, $type)
    {
        return DNS1D::getBarcodePNG($barcode, $type);
    }
}