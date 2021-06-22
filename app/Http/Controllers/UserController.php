<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Buscamos todos los usuarios

    public function allUsers(){

        try{
            return User::all();

        }catch(QueryException $error){
            return $error;
        }
    }
    //Registro un nuevo User

    public function registerUser(Request $request){

        $name = $request->input('name');
        $age = $request->input('age');
        $password = $request->input('password');
        

        //Hasea password

        $password = Hash::make($password);

        try{

            return User::create([
                'name' =>$name,
                'age' =>$age,
                'password' =>$password
                
            ]);
        }catch (QueryException $error){

            $eCode = $error->errorInfo[1];

            if($eCode == 1062){
                return response()->json([
                    'error' => "Usuario registrado anteriormente"
                ]);
            }
        }
    }


    //Login

    public function loginUser(Request $request){

        $name = $request->input('name');
        $password = $request->input('password');


        try{
            //Que el name existe en la tabla user

            $validateUser = User::select('password')
            ->where('name', 'LIKE', $name)
            ->first();

            if(!$validateUser){
                return response()->json([
                    //name incorrecto
                    'error'=>"Name o password incorrecto"
                ]);
            }

            $hashed = $validateUser->password;

            //Comprueba si el password recibido corresponde con el del name del User

            if(Hash::check($password, $hashed)){

                //Genera el token

                $length = 50;
                $token = bin2hex(random_bytes($length));

                //Guardo el token en su campo de la DB

                User::where('name', $name)
                ->update(['token'=>$token]);

                //Devolvemos al front la info ya actualizada
                return User::where('name', 'LIKE', $name)
                ->get();
            }else{
                return response()->json([
                    //Password incorrecto
                    'error'=> "Name o password incorrecto"
                ]);
            }

        }catch(QueryException $error){

            return response()->$error;
        }

    }

    //LogOut

    public function logOutUser(Request $request){

        $name = $request->input('name');

        try{

            return User::where('name', '=', $name)
            ->update(['token' => '']);

        }catch(QueryException $error){
            return $error;
        }
    }

    //Modificar los datos del User

    public function updateUser(Request $request, $id)
    {
        
        $name = $request->input('name');
        $age = $request->input('age');
        


        try {
            return User::where('id', '=', $id)->update([
                'name'=>$name,
                'age'=>$age,
                ]);
            
        } catch(QueryException $error) {
             return $error;
        }
    }

    // Borramos user

    public function deleteUser($id) {

        $member = User::find($id);
        
        if($member) {
            try {

                return $member -> delete();

            }catch (QueryException $error) {

                return $error;
            }
        } else {
            return response() -> json([
                'success' => false,
                'message' => 'El usuario no se puede borrar'
            ], 1000);
        }

    }
}
