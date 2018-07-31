<?php
namespace App\Repositories;

use GuzzleHttp\Client;

class PostsSeller {

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function all()
    {
        $response = $this->client->request('GET', 'api/sellers');
        
        return json_decode( $response->getBody()->getContents() );
    }

    public function find($id)
    {
        $response = $this->client->request('GET', "api/sellers/{$id}");
        
        return json_decode( $response->getBody()->getContents() );
    }

    public function put($request, $id)
    {
        $response = $this->client->request('PUT', "api/sellers/{$id}",
                ['query' => $request]
            );
        
        return json_decode( $response->getBody()->getContents() );
    }

    public function post($request)
    {
        $response = $this->client->request('POST', "api/sellers",
                ['query' => $request]
            );
        
        return json_decode( $response->getBody()->getContents() );
    }

    public function delete($id)
    {
        $response = $this->client->request('DELETE', "api/sellers/{$id}");
        
        return json_decode( $response->getBody()->getContents() );
    }

    public function findAllSales($id)
    {
        $response = $this->client->request('GET', "api/sellersales/{$id}");
        
        return json_decode( $response->getBody()->getContents() );
    }

}