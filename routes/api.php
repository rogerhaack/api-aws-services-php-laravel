<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rotas para S3
Route::post("/s3/file", "S3Controller@sendFile"); // Envia um arquivo
Route::get("/s3/file/{fileName}", "S3Controller@getFile"); // Busca um arquivo
Route::delete("/s3/file/{fileName}", "S3Controller@deleteFile"); // Deleta m arquivo

// Rotas para SQS
Route::get("/sqs/all/messages", "SQSController@getAllMessages"); // Busca todas mensagens
Route::post("/sqs/message", "SQSController@sendMessage"); // Envia mensagem
Route::delete("/sqs/message", "SQSController@deleteMessage"); // Deleta mensagem



