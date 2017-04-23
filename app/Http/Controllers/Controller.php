<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Return a response
     *
     * @param array $data
     * @param int $code
     * @return mixed
     */
    public function response(array $data, $code = 200)
    {
        return response()->json($data, $code);
    }

    /**
     * Return an error
     *
     * @param $message
     * @param int $code default is 500 (internal server error)
     * @return mixed
     */
    public function responseError($message, $code = 500)
    {
        return $this->response([
            'message' => $message,
        ], $code);
    }

    /**
     * Return success message
     *
     * @param $message
     * @param int $code default is 200 (OK)
     * @return mixed
     */
    public function responseSuccess($message, $code = 200)
    {
        return $this->response([
            'message' => $message,
        ], $code);
    }
}
