<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Exceptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index() {
        return response()->json($this->user->paginate(10));
    }

    public function store(Request $request) {
        DB::beginTransaction();

        try {
            $passwordEncrypt = crypt::encryptString($request->password);
            $idUser          =  User::count()+1;

            $userCreated = DB::table('users')->insert(
                [
                    'id'        => $idUser,
                    'name'      => $request->first_name,
                    'email'     => $request->email,
                    'password'  => $passwordEncrypt
                ]
            );
            
            if ($userCreated) {
                $pessonCreated = DB::table('persons')->insert(
                    [
                        'user_id'       => $idUser,
                        'first_name'    => $request->first_name,
                        'last_name'     => $request->last_name,
                        'cpf'           => $request->cpf
                    ]
                ); 

                if ($pessonCreated) {
                    DB::commit();

                    return response()->json([
                        'message' => 'Usuário criado com sucesso!'
                    ]);
                } 

                DB::rollback();

                return response()->json([
                    'message' => 'Houve um problema ao cadastrar a pessoa para o usuário.'
                ]);
            }
            
            DB::rollback();   
            
            return response()->json([
                'message' => 'Houve um problema ao cadastrar o usuário.'
            ]);

        } catch (\Exception $e) {
            DB::rollback(); 

            if(config('app.debug')) {
                return response()->json(apiError::errorMessage($e->getMessage(), 1010));
            }
            
            return response()->json(apiError::errorMessage('Houve um erro ao realizar a operação.', 1010));
        }
    }

    public function show(User $id) {
        return response()->json($id);
    }
 
    public function update(Request $request, User $user) {
        //
    }
 
    public function destroy(User $user) {
        //
    }
}
