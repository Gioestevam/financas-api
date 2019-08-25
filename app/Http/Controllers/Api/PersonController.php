<?php

namespace App\Http\Controllers\Api;

use App\Person;
use App\Exceptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{

    public function __construct(Person $person) 
    {
        $this->person = $person;
    }

    public function index()
    {

        return response()->json($this->person->paginate(10));
    }

    public function store(Request $request)
    {
        try {
            $personData = $request->all();
            $this->person->create($personData);

            return response()->json([
                'message' => 'Pessoa cadastrada com sucesso!',
                200
            ]);

        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json(apiError::errorMessage($e->getMessage(), 1010));
            }
            return response()->json(apiError::errorMessage('Houve um erro ao realizar a operação.', 1010));
        }
    }

    public function show(Person $id)
    {
        return response()->json($id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
