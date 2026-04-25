<?php

namespace App\Amigos\Presentation\Repositories;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Contactos\Controllers\AmigoController;
use Exception;

class AmigoRepository
{

    function all(Request $request, Response $response)
    {
        $controller = new AmigoController();
        $amigos = $controller->getAmigo();
        $response->getBody()->write($contactos);
        return $response->withHeader("Content-Type", "application/json");
    }

    function create(Request $request, Response $response)
    {
        $bodyRequest = $request->getBody()->getContents();
        $data = json_decode($bodyRequest, true);
        $controller = new AmigoController();
        $contacto = $controller->crearamigo($data);
        $response->getBody()->write($contacto);
        return $response->withHeader("Content-Type", "application/json");
    }

    function detail(Request $req, Response $resp, $args)
    {
        try {
            $id = $args['id'];

            $controller = new AmigoController();
            $contacto = $controller->getAmigo($id);

            $resposeBody = $Amigo->toJson();
            $resp->getBody()->write($resposeBody);
            return $resp->withHeader("Content-Type", "application/json");
        } catch (Exception $ex) {
            $resp->getBody()->write("Error: " . $ex->getMessage());
            $code = 400;
            if ($ex->getCode() == 1) {
                $code = 404;
            }
            return $resp->withStatus($code);
        }
    }

    function update(Request $req, Response $resp, $args)
    {
        try {
            $id = $args['id'];
            $body = $req->getBody()->getContents();
            $data = json_decode($body, true);

            $controller = new AmigoController();
            $amigo = $controller->modificarAmigo($id, $data);

            $dataResponse = $contacto->toJson();
            $resp->getBody()->write($dataResponse);
            return $resp
                ->withStatus(200)
                ->withHeader("Content-Type", "application/json");
        } catch (Exception $ex) {
            $resp->getBody()->write("Error: " . $ex->getMessage());
            $code = 400;
            if ($ex->getCode() == 1) {
                $code = 404;
            }
            return $resp->withStatus($code);
        }
    }

    function delete(Request $req, Response $resp, $args)
    {
        try {
            $id = $args['id'];

            $controller = new AmigoController();
            $controller->borrarAmigo($id);

            $dataResponse = json_encode(['mgs' => 'Amigo borrado']);
            $resp->getBody()->write($dataResponse);
            return $resp
                ->withStatus(200)
                ->withHeader("Content-Type", "application/json");
        } catch (Exception $ex) {
            $resp->getBody()->write("Error: " . $ex->getMessage());
            $code = 400;
            if ($ex->getCode() == 1) {
                $code = 404;
            }
            return $resp->withStatus($code);
        }
    }
}
