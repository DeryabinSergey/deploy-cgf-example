<?php

use Google\Cloud\Storage\StorageClient;
use Google\CloudFunctions\FunctionsFramework;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

FunctionsFramework::http('main', [new Application, 'run']);

class Application
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function run(ServerRequestInterface $request): ResponseInterface
    {
        try {
            return $this->handleRequest($request);
        } catch(\Throwable $exception) {
            error_log($exception->getMessage());
        }

        return new Response();
    }

    /**
     * @param ServerRequestInterface $request
     * @return Response
     */
    protected function handleRequest(ServerRequestInterface $request): Response
    {
        //$bucket = (new StorageClient())->bucket($this->googleBucketName);

        $text = 'Response';

        return new Response(200, [], $text);
    }
}