@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')

                        <div class="header h-20 pt-8"><a href={{Route('projects.index')}}>Nos projects</a></div>
                        <div class="bg-white overflow-hidden shadow rounded-lg md:p-8 bodybox">





                            <div class="grid grid-cols-2 md:grid-cols-4 md:my-8">
                                @foreach($projects as $post)
                                    {{-- CARD   --}}
                                    <div class="bg-white w-50 h-72 col-span-1 m-4 rounded text-card shadow-lg flex flex-col justify-between "><a href="/projects/{{$post['id']}}">
                                            <div class=" text-sm text-center h-16 pt-6 pb-2 ">{{$post['name']}}</div>
                                            <img class="w-44 h-40 mx-auto rounded" src="storage/{{$post['image']}}">
                                        </a><div class="text-xs text-[#557b97] mb-6 text-center"><a href="/projects/{{$post['id']}}">Lire plus..</a></div>


                                    </div>
                                @endforeach

                            </div>


                        </div>
                </div>





@endsection

