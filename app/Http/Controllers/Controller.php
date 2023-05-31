<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      title="Szallas.hu felvételi feladat",
 *      version="1.0.0",
 *      description="L5 Swagger OpenApi for how to use this app",
 *      @OA\Contact(
 *          email="gabor.csatlos86@gmail.com"
 *      ),
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
