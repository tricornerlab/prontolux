@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')

    <div class="header h-20 pt-8"><a href={{Route('trends.index')}}>Tendances</a></div>
    <div class="bg-white overflow-hidden shadow rounded-lg p-4 md:p-8 lg:p-8 bodybox">





        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 my-8">
            @foreach($trends as $id=>$post)
                {{-- CARD   --}}
                <div class="bg-white w-46 md:w-46 h-72 col-span-1 m-1 mb-3 md:m-4 lg:m-4 rounded text-card shadow-lg flex flex-col justify-between "><a href="/trends/{{$id}}">
                    <div class=" text-sm text-center h-16 pt-2 md:pt-6 lg:pt-6 ">{{$post}}</div>
                        <img class="w-40 h-40 mx-auto rounded" src="storage/img/trends/{{$id}}/1.jpeg">
                    </a><div class="text-xs text-[#557b97] mb-6 text-center"><a href="/trends/{{$id}}">Lire plus..</a></div>







                </div>
            @endforeach

        </div>


    </div>
    </div>





@endsection
