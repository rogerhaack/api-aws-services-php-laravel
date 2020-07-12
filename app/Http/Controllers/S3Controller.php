<?php

namespace App\Http\Controllers;

use App\Helpers\AwsS3;
use Illuminate\Http\Request;

class S3Controller extends Controller
{
    private $awsS3;

    public function __construct(AwsS3 $awsS3)
    {
        $this->awsS3 = $awsS3;
    }

    function sendFile(Request $request)
    {
        try {
            $result = $this->awsS3->saveFile($request);

            return response()->success("Sucesso.", $result);
        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }
    }

    function getFile($fileName)
    {
        try {

            return $this->awsS3->getFile($fileName);

        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }

    }

    function deleteFile($fileName)
    {
        try {

            $this->awsS3->deleteFile($fileName);

            return response()->success("Sucesso.");

        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }

    }


}
