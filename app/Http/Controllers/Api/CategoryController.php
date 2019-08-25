<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Exceptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function index(){
        return response()->json($this->category->paginate(10));
    }

    public function store(Request $request) {
        try {
            $categoryData = $request->all();
            $this->category->create($categoryData);

            return response()->json([
                'message' => 'Categoria cadastrada com sucesso!',
                200
            ]);
        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json(apiError::errorMessage($e->getMessage(), 1010));
            }
            return response()->json(apiError::errorMessage('Houve um erro ao realizar a operação.', 1010));
        }
    }

    public function show(Category $id){
        return response()->json($id);
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
