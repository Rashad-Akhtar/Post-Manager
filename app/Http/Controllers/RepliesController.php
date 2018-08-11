<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;

class RepliesController extends Controller
{
    public function edit($id)
    {
        $reply = Reply::find($id);

        return view('replies.edit')->with('reply',$reply);
    }

    public function update(Request $request , $id)
    {
        $this->validate($request,[
            'reply_content' => 'required'
        ]);

        $reply = Reply::find($id);

        $reply->content = $request->reply_content;

        $reply->save();

        return redirect()->route('discussion',['slug'=>$reply->discussion->slug]);
    }
}
