<?php

    namespace pizzashop\shop\config;

    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Server\RequestHandlerInterface;

    class CorsMiddleware
    {
        public function __invoke(Request $request, RequestHandlerInterface $handler): Response
        {
            // Vérifie si l'en-tête "Origin" est présent
            if (!$request->hasHeader('Origin')) {
                throw new HttpUnauthorizedException($request, "Missing Origin Header (CORS)");
            }

            $response = $handler->handle($request);

            // Ajoute les en-têtes CORS
            $response = $response
                ->withHeader('Access-Control-Allow-Methods', 'POST, PUT, GET')
                ->withHeader('Access-Control-Allow-Headers', 'Authorization')
                ->withHeader('Access-Control-Max-Age', '3600')
                ->withHeader('Access-Control-Allow-Credentials', 'true');

            return $response;
        }
    }


?>