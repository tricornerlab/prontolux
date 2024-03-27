@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')
        
                {{--  HEADER GREY_BG    --}}

                <div class="header">

                    Search results 
                </div>

                {{-- MAIN  --}}
                <main class="mt-8 bg-white overflow-hidden shadow rounded-lg h-full">


                <h5 class="font-semibold p-8">
                    Menu <span class="font-bold text-green">></span>
                     Resultats de recherches: 
                     {{ $query}}
                </h5>

                    <div class="p-8 border-r border-b main ">
                        @foreach($results as $result)
                            <a href="/products/{{$result->id}}">{{$result->name ??''}}</a>
                            <hr>
                        @endforeach    
                            
                           

                        </div>


                </main>
                </div>
           



@endsection
