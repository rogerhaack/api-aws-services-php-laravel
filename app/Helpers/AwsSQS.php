<?php

namespace App\Helpers;

use Aws\Exception\AwsException;
use Illuminate\Support\Facades\App;

class AwsSQS
{

    public function sendMessage($message)
    {
        try {
            $type = "Consultando SQS";

            $client = App::make('aws')->createClient('Sqs');

            $params = [
                'DelaySeconds' => 0,
                'MessageAttributes' => [
                    "type" => [
                        'DataType' => "String",
                        'StringValue' => $type
                    ],
                ],
                'MessageBody' => $message['message'],
                'QueueUrl' => env("AWS_QUEUE_URL")
            ];

            try {
                $client->sendMessage($params);

                return true;
            } catch (AwsException $e) {
                throw new \Exception($e->getMessage());
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getAllMessages()
    {
        try {
            $client = App::make('aws')->createClient('Sqs');

            $result = $client->receiveMessage(array(
                'QueueUrl' => env("AWS_QUEUE_URL")
            ));

            $messages = $result->get('Messages');

            if (!empty($messages)) {
                return $messages;
            } else {
                return [];
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function deleteMessage($messageReceiptHandle)
    {
        try {
            $client = App::make('aws')->createClient('Sqs');

            try {

                $result = $client->deleteMessage([
                    'QueueUrl' => env("AWS_QUEUE_URL"),
                    'ReceiptHandle' => $messageReceiptHandle['messageHandle']
                ]);

                print_r($result);

            } catch (AwsException $e) {
                throw new \Exception($e->getMessage());
            }

            return "";

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}