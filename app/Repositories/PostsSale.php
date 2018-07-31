<?php
namespace App\Repositories;

use GuzzleHttp\Client;

class PostsSale {

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function all()
    {
        $response = $this->client->request('GET', 'api/sales');
        
        return json_decode( $response->getBody()->getContents() );
    }
    
    public function allSellers()
    {
        $response = $this->client->request('GET', 'api/sellers');
        
        return json_decode( $response->getBody()->getContents() );
    }

    public function find($id)
    {
        $response = $this->client->request('GET', "api/sales/{$id}");
        
        return json_decode( $response->getBody()->getContents() );
    }

    public function put($request, $id)
    {
        $response = $this->client->request('PUT', "api/sales/{$id}",
                ['query' => $request]
            );
        
        return json_decode( $response->getBody()->getContents() );
    }

    public function post($request)
    {
        $response = $this->client->request('POST', "api/sales",
                ['query' => $request]
            );
        
        return json_decode( $response->getBody()->getContents() );
    }

    public function delete($id)
    {
        $response = $this->client->request('DELETE', "api/sales/{$id}");
        
        return json_decode( $response->getBody()->getContents() );
    }

}