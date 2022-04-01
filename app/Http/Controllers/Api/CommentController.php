<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'nullable'|'string'| 'max:50',
            'content' => 'string'| 'required',
            'post_id' => 'exists:post,id'
        ]);
        
        if($validator->fails()){
            return response()->json([
                'success' => 'false',
                'error' => '$validator->errors()',
                'data' => $data
            ],400);
        }

        $newComment = new Comment();
        if(!empty($data['name'])){
            $newComment->name = $data['name'];
        }
        $newComment->content = $data['content'];
        $newComment->post_id = $data['post_id'];
        $newComment->save();

        return response()->json([
            'success' => 'true',
        ]);

    }
}