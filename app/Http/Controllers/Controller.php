<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function createSuccessResponse($data, $code) {
        return response()->json(['data'=>$data], $code);   // $code = status code e.g 200
    }

    public function createErrorResponse($message, $code) {
        return response()->json(['message'=>$message, 'code' =>$code], $code);
        // The first $code = 404, The second is 404 not found <= status code
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        return $this->createErrorResponse($errors, 422);
    }
}
