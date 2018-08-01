<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Repositories\PostsSeller;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    protected $posts;

    public function __construct(PostsSeller $posts)
    {
        $this->posts = $posts;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = $this->posts->all();
        
        return view('site.seller.seller',compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados['name'] =  $request->input('name');
        $dados['email']=  $request->input('email');
     
        $seller = $this->posts->post($dados);

        return redirect('seller');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller = $this->posts->find($id);
        $allSales = $this->posts->findAllSales($id);

        $dados['seller'] = $seller;
        $dados['allSales'] = $allSales;

        $totalVendas = 0;
        foreach ($allSales as  $value) {
            $totalVendas = $totalVendas + $value->sale_value; 
        }

        $dados['totalVendas'] = $totalVendas;
        
        return view('site.seller.profile', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seller = $this->posts->find($id); 

        return view('site.seller.edit', compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados['name'] =  $request->input('name');
        $dados['email']=  $request->input('email');
     
        $seller = $this->posts->put($dados, $id);

        return redirect('seller');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = $this->posts->delete($id);

        return redirect('seller');
    }
}
