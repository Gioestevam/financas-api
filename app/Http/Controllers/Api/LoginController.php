<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {

    public function login(Request $request) {
        $passwordEncrypt = Crypt::encryptString($request->password);
        $user = DB::table('users')
            ->select('users.id', 'users.email', 'users.password', 'persons.first_name', 'persons.cpf')
            ->join('persons', 'users.id', '=', 'persons.user_id')        
            ->where('email', $request->email)->first();
        
        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado.',
                'status_code' => 200
            ]);
        }

        if ($passwordEncrypt = $user->password) {
            $token = hash::make($user->id);

            DB::table('token_user')->insert(
                array(
                    'token' => $token,
                    'user_id' => $user->id
                )
            );

            return response()->json([
                'user_id' => $user->id,
                'email' => $user->email,
                'fist_name' => $user->first_name,
                'cpf' => $user->cpf,
                'token' => $token
            ]);
        }

        return response()->json([
            'message' => 'Senha incorreta!',
            'status_code' => 200
        ]);

    }

    public function show(User $user) {
        //
    }   
 
    public function update(Request $request, User $user) {
        //
    }

    public function destroy(User $user) {
        //
    }
}
