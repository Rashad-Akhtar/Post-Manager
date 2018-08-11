<?php

namespace App\Http\Controllers;

use Auth;
use App\Watcher;
use Illuminate\Http\Request;

class WatchersController extends Controller
{
    public function watch($id)
    {
        Watcher::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id
        ]);

        return redirect()->back();
    }

    public function unwatch($id)
    {
        $unwatch = Watcher::where('discussion_id',$id)->where('user_id',Auth::id())->first();

        $unwatch->delete();

        return redirect()->back();    
    }
}
