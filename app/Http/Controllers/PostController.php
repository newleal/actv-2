<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;

class PostController extends Controller
{
    

    public function post()
    {
        $post = Post::all()->toArray();
        
        return response()->json(
            [
                'code' => 200,
                'status' => 'true',
                'data' => $post
            ]
        );
        
    }

    public function store(Request $request)
    {


        $posts = [
            [

                'name' => 'Los almuerzos mas ricos para la semana',
                'description' => 'Los almuerzos mas ricos del dia L-M-MI-J-V',
                'state'  => 1,
                'category_id'  => 1,
                'contenido'  => 'Almuerzos mas ricos del Lunes L-M-MI-J-V'
            ],
            [

                'name' => 'La pasta tien propiedades sanadoras',
                'description' => 'Beneficion de la pasta',
                'state'  => 0,
                'category_id'  => 2,
                'contenido'  => 'Para cuabdo se habla dela salud la pasta es fundamental'
            ]
        ];

         //foreach ($posts as $post) {
           //  # code...
          //   Post::create($post);
         //}

        Post::create($request->all());

       

    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        
        $post->description = 'Descripcion generica';
        
        $post->save();
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
    }
}
