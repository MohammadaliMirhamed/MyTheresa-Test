<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;


class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * make response for api
     * @param array data
     * @param int $status
     * @return Response
     */
    public function makeResponse(array $data, int $status = 200) :Response
    {
        return response(
            [
                'data' => $data,
                'status' => $status
            ],
            $status
        );
    }
}
