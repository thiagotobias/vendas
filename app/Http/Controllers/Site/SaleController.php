<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Repositories\PostsSale;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    protected $posts;

    public function __construct(PostsSale $posts)
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
        $sales = $this->posts->all();

        return view('site.sale.sale',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers = $this->posts->allSellers();

        return view('site.sale.create', compact('sellers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados['sale_value'] =  $request->input('sale_value');
        $dados['seller_id']=  $request->input('seller_id');
     
        $sale = $this->posts->post($dados);

        return redirect('sale');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = $this->posts->find($id); 

        return view('site.sale.profile', compact('sale'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = $this->posts->find($id); 

        return view('site.sale.edit', compact('sale'));
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
        $dados['sale_value'] =  $request->input('sale_value');
     
        $sale = $this->posts->put($dados, $id);

        return redirect('sale');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = $this->posts->delete($id);

        return redirect('sale');
    }
}
