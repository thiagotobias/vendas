<?php

namespace App\Http\Controllers\Site;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://vendas.local',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'api/sellers');
        
        //return json_decode( $response->getBody()->getContents() );
        $dados = json_decode( $response->getBody()->getContents() );
        return view('site.index',compact('dados'));
    }
}