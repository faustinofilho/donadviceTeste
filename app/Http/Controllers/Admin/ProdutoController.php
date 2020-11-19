<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use App\Http\Requests\ProdutoFornecedorRequest;
use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\ProdutoFornecedor;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::All();
        return view('admin.produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        Produto::updateOrCreate(
            ['id' => $request['id']], 
            $request->all()
        );

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $fornecedores = Fornecedor::All();
        $listFornecedores = ProdutoFornecedor::with(['fornecedor', 'produto'])->where('produto_id', $id)->get();
       
        return view('admin.produto.edit', compact('produto', 'fornecedores', 'listFornecedores'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::find($id)->delete();
        return response()->json(['success' => true]);
    }

    public function storeFornecedor(ProdutoFornecedorRequest $request)
    {
        ProdutoFornecedor::updateOrCreate(
            ['id' => $request['id']], 
            $request->all()
        );
        
        return response()->json([
            'success' => true, 
            'listFornecedores'=>$this->queryProdutoFornecedor($request->produto_id)
        ]);
    }

    public function destroyProdutoFornecedor($id)
    {
        
        $prod = ProdutoFornecedor::find($id);
        $idProd = $prod->produto_id;
        $delete = $prod->delete();
        
        return response()->json([
            'success' => true, 
            'listFornecedores'=>$this->queryProdutoFornecedor($idProd)
        ]);
    }

    public function queryProdutoFornecedor($id)
    {

        $listFornecedores = ProdutoFornecedor::with(['fornecedor', 'produto'])->where('produto_id', $id)->get();

        return $listFornecedores;
    }
}
