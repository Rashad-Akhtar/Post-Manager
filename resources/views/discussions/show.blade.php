@extends('layouts.app')

@section('content')

                    <div class="card">

                    <div class="card-heading pt-2">

                        <img src="{{ asset('avatars/graduate.png') }}" class="ml-2" alt="avatar" width="50" height="50">
                        <span class="text-primary font-weight-bold ml-2">{{ $discuss->user->name }} , {{ $discuss->created_at->diffForHumans() }} </span>
                        {{-- @if(Auth::check())

                        @if($discuss->is_watched_by_auth_user())

                        <a href=" {{ route('discussion.unwatch',['id'=>$discuss->id]) }} " class="btn btn-info btn-sm float-right mr-2">Unwatch</a>

                        @else 

                        <a href=" {{ route('discussion.watch',['id'=>$discuss->id]) }} " class="btn btn-info btn-sm float-right mr-2">Watch</a>

                        @endif 

                        @endif --}}
                        <hr>

                    </div>

                    <div class="card-body">

                        <h4 class="text-center font-weight-bold"> {{ $discuss->title }} </h4>

                        <hr>

                        <p class="text-center">
                            {!! Markdown::convertToHtml($discuss->content) !!}
                        </p>

                    </div>

                    <div class="card-footer">

                        @if( $discuss->replies->count() > 1 )

                        {{ $discuss->replies->count() }} Replies
                        
                        @else
                        
                        {{ $discuss->replies->count() }} Reply
                        
                        @endif

                        <a href="{{ route('channel.slug',['slug'=>$discuss->channel->slug]) }}" class="btn btn-default btn-sm float-right">{{ $discuss->channel->title }}</a>
                    
                    </div>

                    </div>
                    <br>

                    {{-- @if( count($discuss->replies) > 0) --}}

                    @if($best_answer)

                      <h3 class="text-center text-info"> Best Reply </h3>

                        <div class="card">
                            <div class="card-heading text-center p-2">
                                <img src="{{ asset('avatars/graduate.png') }}" class="ml-2" alt="avatar" width="50" height="50">
                                <span class="ml-2 text-primary font-weight-bold">{{ $best_answer->user->name }} &nbsp; ( {{ $best_answer->user->points }} )</span>
                            </div>
                            <div class="card body text-center p-4">
                                  <span class="text-info">{{ $best_answer->content }}</span>
                            </div>
                        </div>
                        <br>
                    @endif

                    {{-- @endif  --}}
                    
                    <h3 class="text-primary">Replies</h3>
                    <hr>
                    @foreach($discuss->replies as $r )
                    <div class="card">

                    <div class="card-heading pt-2">

                    <img src="{{ asset('avatars/graduate.png') }}" class="ml-2" alt="avatar" width="50" height="50">
                        <span class="text-primary font-weight-bold ml-2">{{ $r->user->name }} &nbsp; ( {{ $r->user->points }} )  </span>
                        
                        {{-- <a href=" {{ route('discussion',['slug'=>$d->slug]) }} " class="btn btn-info float-right mr-2">View</a> --}}
                        @if(!$best_answer)
                              @if(Auth::id() == $discuss->user->id)
                              <a href="{{ route('reply.best_answer',['id'=>$r->id]) }}" class="btn btn-info btn-sm float-right mr-2">Mark as best answer</a>
                              @endif
                        @endif

                        @if(Auth::id() == $r->user->id)
                           @if(!$r->best_answer)
                           <span class="float-right mr-4"><a href="{{ route('reply.edit',['id'=>$r->id]) }}" class="btn btn-info btn-sm">Edit</a></span>
                           @endif
                        @endif
                        <hr> 

                    </div>

                    <div class="card-body">

                    <p class="text-center">
                        {{ $r->content  }}
                    </p>

                    </div>

                    @if(Auth::check())

                    <div class="card-footer">

                            @if($r->is_liked_by_auth_user())
    
                              <a href="{{ route('reply.unlike',['id'=>$r->id]) }}" class="btn btn-danger btn-xs">Unlike</a>
    
                               {{-- <span class="ml-2"> {{ $r->likes->count() }} Likes </span> --}}
    
                            @else
                              
                              <a href="{{ route('reply.like',['id'=>$r->id]) }}" class="btn btn-primary btn-xs">Like</a>
                                
                                {{-- <span class="ml-2"> {{ $r->likes->count() }} Likes </span> --}}
                                
                            @endif
    
                            
                            @if( $r->likes->count() == 0 )
                            <span class="ml-2 text-info"> Be the first to like this </span>
                            @elseif( $r->likes->count() == 1 )
                            <span class="ml-2 text-info"> {{ $r->likes->count() }} Like </span>  
                            @else
    
                            <span class="ml-2 text-info"> {{ $r->likes->count() }} Likes </span>
    
                            @endif
    
                            <span class="float-right text-primary font-weight-bold mr-2">{{ $r->created_at->diffForHumans() }}</span>
    
                    </div>

                    @endif

                    </div>
                    <br>



                    @endforeach 

                    <hr>

                    <div class="card">

                        <div class="card-heading">
                           <h3 class="text-center text-info pt-3">Leave A Reply</h3>
                        </div>
                        <hr>

                        <div class="card-body">
                            @if(Auth::check())
                            <form action="{{  route('reply.store',['id'=>$discuss->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                           <label for="reply">Content</label>
                                          <textarea name="content" class="form-control" cols="5" rows="5"></textarea>   
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-info btn-xs float-right">Leave Reply</button>
                                    </div>
                            </form>
                            @else
                             <h3 class="text-info text-center">Please Sign in to leave a reply</h3>
                            @endif
                        </div>

                    </div>

@endsection


