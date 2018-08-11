<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Like;
use Auth;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function like($id)
    {
        $like = Like::create([
            'user_id' => Auth::id(),
            'reply_id' => $id
        ]);

        return redirect()->back();
    }
    public function unlike($id)
    {
        $unlike = Like::where('reply_id',$id)->where('user_id',Auth::id())->first();

        $unlike->delete();

        return redirect()->back();
    }

    public function best_answer($id)
    {
        $reply = Reply::find($id);

        $reply->best_answer = 1 ;

        $reply->save();

        $reply->user->points += 200;

        $reply->user->save();
      
         
       return redirect()->back();

    }
}
