@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')

    <div class="header h-20 pt-8"><a href="{{Route('posts.index')}}">News</a></div>
    <div class="bg-white overflow-hidden shadow rounded-lg min-h-full">






            @foreach($news as $title=>$content)

            <h3 class=" h-20 pt-8 mx-8 font-bold"><a href="{{Route('posts.index')}}">News</a><span class="text-[#94ae0e]"> > </span> {{$title}}</h3>
                <div class=" text-sm mx-8 ">{{$content}}</div>
                <div class="grid grid-cols-4 mt-4 ml-4">
{{--                @foreach($files as $url)--}}
{{--                        <img class="w-40 h-40 m-4 shadow-xl rounded" src={{asset("storage/$url")}}>--}}
{{--                @endforeach--}}




                </div>
            @endforeach




    </div>
    </div>





@endsection
