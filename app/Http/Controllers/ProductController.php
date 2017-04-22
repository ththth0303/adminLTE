<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Commment;

class ProductController extends Controller
{
    public function index()
    {
        $account = Product::all();
        
        return view('admin.products.index')->with('account', $account);
    }

    public function show($id)
    {

        $commments = Product::find($id)->commments;
        $account = Product::find($id);

        return view('admin.products.show')->with(['account' => $account,'commments' => $commments ]);
    }
}
