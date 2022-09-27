<?php

namespace App\Infrastructure\Interfaces\Services;

use Illuminate\Http\Request;

interface ProductServiceInterface 
{
    public function list(Request $request, int $limit);
}