<?php

namespace App\Helpers;


use Illuminate\Http\Testing\MimeType;
use Illuminate\Support\Facades\Storage;

class AwsS3
{
    public function saveFile($file)
    {
        try {

            if ($file->hasfile('file')) {

                $token = uniqid(date('HisYmd'));
                $extension = $file->file->extension();
                $nameFile = "{$token}.{$extension}";
                $nameOriginal = $file->file->getClientOriginalName();

                $upload = $file->file->storeAs("files", $nameFile, "s3");

                if (!$upload) {
                    throw new \Exception("Erro ao fazer upload do arquivo");
                }

                return [
                    "originalName" => $nameOriginal,
                    "s3Name" => $token,
                    "extension" => $extension
                ];

            } else {
                throw new \Exception("Arquivo não informado");
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getFile($fileName)
    {
        try {

            $filePath = "files/{$fileName}";

            if (Storage::disk('s3')->exists($filePath)) {

                $mimeType = MimeType::from(strtolower($fileName));

                return response(Storage::disk('s3')->get("files/{$fileName}", 200))
                    ->header('Content-Type', $mimeType)
                    ->header('Content-Disposition', "attachment; filename={$fileName}");

            } else {
                throw new \Exception("Arquivo não existe.");
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function deleteFile($fileName)
    {
        try {
            $filePath = "files/{$fileName}";

            if (Storage::disk('s3')->exists($filePath)) {

                Storage::disk('s3')->delete($filePath);

                return true;

            } else {
                throw new \Exception("Arquivo não existe");
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}