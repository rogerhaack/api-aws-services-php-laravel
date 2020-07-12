<?php

namespace App\Http\Controllers;

use App\Helpers\AwsSQS;
use App\Http\Requests\SQSDeleteMessage;
use App\Http\Requests\SQSMessage;

class SQSController extends Controller
{
    private $awsSQS;

    public function __construct(AwsSQS $awsSQS)
    {
        $this->awsSQS = $awsSQS;
    }

    public function sendMessage(SQSMessage $message)
    {
        try {
            $validated = $message->validated();

            $this->awsSQS->sendMessage($validated);

            return response()->success("Mensagem enviada.");

        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }
    }

    public function getAllMessages()
    {
        try {
            $result = $this->awsSQS->getAllMessages();

            return response()->success("Sucesso.", $result);

        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }
    }

    public function deleteMessage(SQSDeleteMessage $deleteMessage)
    {
        try {
            $validated = $deleteMessage->validated();

            $result = $this->awsSQS->deleteMessage($validated);

            return response()->success("Sucesso.", $result);

        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }
    }
}
