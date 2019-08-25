<?php

namespace App\Http\Controllers\Api;

use App\Incoming;
use App\Exceptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomingController extends Controller {
    public function __construct(Incoming $incoming) {
        $this->incoming = $incoming;
    }

    public function index(){
        return response()->json($this->incoming->paginate(10));
    }

    public function store(Request $request) {
        try {
            $incomingData = $request->all();
            $this->incoming->create($incomingData);

            return response()->json([
                'message' => 'Incoming cadastrada com sucesso!',
                200
            ]);
        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json(apiError::errorMessage($e->getMessage(), 1010));
            }
            return response()->json(apiError::errorMessage('Houve um erro ao realizar a operação.', 1010));
        }
    }

    public function show(Incoming $id){
        return response()->json($id);
    }

    public function update(Request $request, Incoming $incoming) {
        //
    }

    public function destroy(Incoming $incoming) {
        //
    }
}
