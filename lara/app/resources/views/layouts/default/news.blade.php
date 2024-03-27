@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')

    <div class="header"><a href="{{Route('posts.index')}}">Nouveautés</a></div>
                <div class=" mt-2md:mt-8 bg-white overflow-hidden shadow rounded-lg">





                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 mt-0 pt-0 min-h-full">
                        @foreach($news as $post)
                            <div class="bg-white w-22 h-22 col-span-1 m-4 rounded-md text-card shadow-md flex flex-col justify-between">
                                <div class=" text-sm m-2 text-center ">{{$post['name']}}</div>
                                <div class="text-xs text-gray-300 text-left mx-4">{{$post['content']}}</div>
                                <div class="text-xs text-[#557b97] mb-4 text-center"><a href="posts/{{$post['id']}}">Lire plus..</a></div>
                            </div>
                        @endforeach

                    </div>


                </div>
                </div>




@endsection
