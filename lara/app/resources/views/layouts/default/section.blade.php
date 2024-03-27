@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')
                @foreach($content as $title => $section)
                {{--  HEADER GREY_BG    --}}

                <div class="header">

                    {{$title}}
                </div>

                {{-- MAIN  --}}
                <main class="mt-8 bg-white overflow-hidden shadow rounded-lg h-full">


                <h5 class="font-semibold p-8">
                    Menu <span class="font-bold text-green">></span>
                    {{$title ??''}}
                </h5>

                    <div class="p-8 main ">
                            {!!$section!!}
                        </div>


                </main>
                </div>
                @endforeach



@endsection
