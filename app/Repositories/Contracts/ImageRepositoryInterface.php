<?php

namespace App\Repositories\Contracts;

interface ImageRepositoryInterface
{
    public function saveImage();
    public function base64toImage();
}