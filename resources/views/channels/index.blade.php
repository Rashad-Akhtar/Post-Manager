@extends('layouts.app')

@section('content')

<div class="container">

    <div class="categories text-center">
          <table class="table-bordered table-stripped table-condensed" style="width : 100%">

            <thead>

                <th class="text center text-primary">Channel name</th>
                <th class="text center text-success">Edit</th>
                <th class="text center text-danger">Delete</th>

            </thead>

            <tbody>

                @foreach($channels as $channel)

                    <tr>
                        <td>

                            {{ $channel->title }}
                            
                        </td>
                        <td>

                             <a href="{{ route('channels.edit',['channel'=>$channel->id]) }}" class="btn btn-info btn-sm">Edit</a>
                                
                        </td>
                        <td class="p-2">

                            <form action="{{ route('channels.destroy',['channel'=>$channel->id]) }}" method="POST">

                                     @csrf
                                     {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                            </form>
                                    
                        </td>
                    </tr>

                @endforeach

            </tbody>

          </table>
    </div>

</div>

@endsection