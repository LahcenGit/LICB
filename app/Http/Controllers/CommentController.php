<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request){
        if(Auth::user()){
            $existingComment = Comment::where('user_id', Auth::user()->id)
                                ->where('product_id', $request->product)
                                ->first();
            if ($existingComment) {
                return response()->json(['error' => 'You have already commented on this product.']);
            }
            else{
                $user = User::where('id',Auth::user()->id)->first();
                $comment = new Comment();
                $comment->user_id = $user->id;
                $comment->product_id = $request->product;
                $comment->comment = $request->comment;
                $comment->rating = $request->rating;
                $comment->save();
                $average_rating = Comment::where('product_id', $request->product)->avg('rating');
                $count_commment = Comment::where('product_id', $request->product)->count();
                $data = array(
                    'date' => $comment->created_at->format('Y-m-d H:m'),
                    'name' => $comment->user->first_name.' '. $comment->user->last_name,
                    'comment' => $comment->comment,
                    'rating' => $comment->rating,
                    'average_rating' => $average_rating,
                    'count_comments' => $count_commment,
                );
                return $data;
            }

        }
        else{
            $res = 'error';
            return $res;
        }

    }
}
