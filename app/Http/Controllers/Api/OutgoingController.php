<?php

namespace App\Http\Controllers\Api;

use App\Outgoing;
use App\Exceptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutgoingController extends Controller {
    
    public function __construct(Outgoing $outgoing) {
        $this->outgoing = $outgoing;
    }

    public function index(){
        return response()->json($this->outgoing->paginate(10));
    }

    public function store(Request $request) {
        try {
            $outgoingData = $request->all();
            $this->outgoing->create($outgoingData);

            return response()->json([
                'message' => 'Outgoing cadastrada com sucesso!',
                200
            ]);
        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json(apiError::errorMessage($e->getMessage(), 1010));
            }
            return response()->json(apiError::errorMessage('Houve um erro ao realizar a operação.', 1010));
        }
    }

    public function show(Outgoing $id){
        return response()->json($id);
    }

    public function update(Request $request, Outgoing $outgoing){
        //
    }

    public function destroy(Outgoing $outgoing){
        //
    }
}
