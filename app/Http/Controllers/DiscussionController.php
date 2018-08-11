<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Reply;
use App\User;
use App\Discussion;
use Notification;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function create()
    {
        return view('discuss');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
           'title' => 'required',
           'channel_id' => 'required',
           'discuss_content' => 'required'
        ]);
        
        $discussion = Discussion::create([
            'title' => $request->title,
            'channel_id' => $request->channel_id,
            'content' => $request->discuss_content,
            'user_id' => Auth::id(),
            'slug' => str_slug($request->title)
        ]);

        Session::flash('success','Discussion Created');

        return redirect()->route('discussion',['slug'=>$discussion->slug]);

    }

    public function show($slug)
    {
        // $d = Discussion::where('slug',$slug)->first();
        
       
        // $best_reply = 'Any';

    //    if(count($d->replies) > 0 ){
    //     $highest_count = 0;
    //     foreach($d->replies as $r):

    //         $count = count($r->likes);

    //         if( $count >= $highest_count ){
    //             $highest_count = $count;
    //             $best_reply = $r; 
    //         }
    //     endforeach;
    //     $best_answer_user = User::where( 'id' , $best_reply->user_id )->first();
    //     $best_reply_content = Reply::where('content',$best_reply->content)->first();

    //     return view('discussions.show')->with('discuss',Discussion::where('slug',$slug)->first())->with('best',$best_answer_user)->with('reply',$best_reply_content);
    //    }
    //    else{
        $d = Discussion::where('slug',$slug)->first();

        $best_answer = $d->replies->where('best_answer',1)->first();


        return view('discussions.show')->with('discuss',$d)->with('best_answer',$best_answer);

    //    }
        

        
    }

    public function reply(Request $request , $id)
    {
        $d = Discussion::find($id);

        $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => $request->content
        ]);

        $reply->user->points += 10 ;
        $reply->user->save();

        $watchers = array();

        foreach($d->watchers as $w):
            array_push($watchers, User::find($w->user_id) );
        endforeach;
        
        Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));
        

        return redirect()->back();
    }

    public function edit($id)
    {
        $discussion = Discussion::find($id);

        return view('discussions.edit')->with('discussion',$discussion);
    }

    public function update(Request $request , $id)
    {
        $this->validate($request,[
            'discuss_content' => 'required'
        ]);

        $discussion = Discussion::find($id);

        $discussion->content = $request->discuss_content;

        $discussion->save();

        return redirect()->route('discussion',['slug'=>$discussion->slug]);
    }
}
