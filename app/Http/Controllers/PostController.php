<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Buscamos todos los posts

    public function allPosts(){

        try{
            return Post::all();

        }catch(QueryException $error){
            return $error;
        }
    }
    //Crear un nuevo post

    public function createPost(Request $request){

        $title = $request->input('title');
        $iduser = $request->input('iduser');
        

        try{

            return Post::create([
                'title' =>$title,
                'iduser' =>$iduser
                
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

    //Modificar los Posts

    public function updatePost(Request $request, $id)
    {
        
        $title = $request->input('title');
        


        try {
            return Post::where('id', '=', $id)->update([
                'title'=>$title,
                ]);
            
        } catch(QueryException $error) {
             return $error;
        }
    }

    // Borramos post

    public function deletePost($id) {

        $message = Post::find($id);
        
        if($message) {
            try {

                return $message -> delete();

            }catch (QueryException $error) {

                return $error;
            }
        } else {
            return response() -> json([
                'success' => false,
                'message' => 'El post no se puede borrar'
            ], 1000);
        }

    }

}
