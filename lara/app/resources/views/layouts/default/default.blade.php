@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')

<div class="flex inline-flex w-full m-auto">
    <div class="  mt-4 ml-4 w-8">
            
    <!--{{--  SANDWICH              --}}-->
    <!--            <label id="hamburger" for="hamburger-input" class="md:hidden lg:hidden ">-->
    <!--                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#3d4246" class="bi bi-list" viewBox="0 0 16 16">-->
    <!--                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>-->
    <!--                </svg>-->
    <!--            </label>-->
    <!-- {{--  SANDWICH MENU  --}}-->
    <!--<input type="checkbox" id="hamburger-input" class=" " />-->
    <!--<ul class="nav-menu text-base font-semibold  ">-->
    <!--    @foreach($sections as $link=>$section)-->
    <!--        <li class="py-1 " id="nav"><a href="/{{$link}}" class="">{{$section}}</a></li>-->
    <!--    @endforeach-->
    <!--</ul>-->
    </div>
    <div class="header text-lg md:text-xl pt-3 md:pt-5 lg:pt-5 lg:text-xl  md:ml-0 lg:ml-0  ">
        <a href="{{Route('categories.show', '97')}}">Nouveautés</a>
    </div>
    <div class="w-11"></div>
    
</div>
    <div class="md:mt-8 lg:mt-8 bg-white overflow-hidden shadow rounded-lg">
        {{--  GRID--}}
        <div class="grid grid-cols-1 md:grid-cols-4">
            {{--  ITEM1--}}

            @foreach ($products as $new)
            <div class="p-6 border-b md:border-r lg:border-r md:border-b-none lg:border-b-none h-full">
                <div class="">
                    <img src="storage/{{$new['image']}}" class="w-40 h-40 text-gray-500 border mx-auto shadow-sm rounded-md">
                    <div class="ml-4 text-base leading-7 font-semibold">
                        <a href="/products/{{$new['id']}}" class=" text-gray-700 ">{{$new['name']}}</a></div>
                </div>

                <div class="ml-4 text-xs">
                    {{$new['description']}}
                </div>
            </div>
            @endforeach


        </div>
    </div>
    <div class="header bg-transparent text-lg">
        <a href="{{Route('categories.show', '97')}}"><button class="text-white p-1 m-5 button1 bg-[#557b97]" type="button" >tous</button>
    </div></a>


    {{--   TRENDS--}}


    <div class="header bg-white ">
        <div class="header md:m-5 lg:m-5 text-lg md:text-xl lg:text-xl "><a href="{{Route('trends.index')}}">Tendances en eclairage </a></div>
    </div>
    <div class="banner" >
        <img src={{asset('/storage/img/welcome/Gweilo.jpg')}} class="banner">
    </div>
    <div class="header bg-white">
    <button class="text-white p-1 m-5 button1 "><a href="{{Route('trends.index')}}">lire</a></button>
    </div>



    {{--NEWS--}}
    <div class="header news bg-grey-500 h-fit" >

        <a href="{{Route('posts.index')}}"><div class=" header md:m-5 lg:m-5 text-lg md:text-xl lg:text-xl p-0">News</div></a>

        <div class="grid md:grid-cols-4 lg:grid-cols-4 grid-col-2">
            @foreach($news as $post)
            <div class="bg-white min-w-16 md:w-22 md:h-22 col-span-1 m-4 rounded-md text-card shadow-md flex flex-col justify-between">
                <div class=" text-sm m-2 ">{{$post['name']}}</div>
                <div class="text-xs text-gray-300 text-left mx-4 ">{{$post['content']}}</div>
                <div class="text-xs text-[#557b97] mb-2"><a href= "/{{$post['id']}}"}>Lire plus..</a></div>
            </div>
            @endforeach

        </div>

        <button class="text-white button1  bg-[#557b97] md:my-11 lg:my-11 "><a href="{{Route('posts.index')}}">tous</a></button>

    </div>

    {{--BANNER PROJECTS--}}

    <div class="header bg-white " >

        <a href="{{Route('projects.index')}}"><div class="m-0 header md:m-5 lg:m-5 text-lg md:text-xl lg:text-xl p-0 md:p-5 lg:p-5">Nos projects</div></a>
    </div>

        <img src={{asset('/storage/img/welcome/panzeri.jpeg')}} class="banner">
    <div class="header bg-white" >
        <a href="{{Route('projects.index')}}"><button class="text-white button1 m-0  md:m-11 lg:m-11">tous</button></a>
     </div>

    {{--BANNER TECHNOLOGIES LED--}}

    <div class="header bg-grey-500" >
        <a href="{{Route('technologies.index')}}"><div class=" header m-0 header md:m-5 lg:m-5 text-lg md:text-xl lg:text-xl p-0 md:p-5 lg:p-5">Technologie LED</div></a>
    </div>

    <img src="{{asset('/storage/img/welcome/technologie.jpeg')}}" class="banner h-68">
    <div class="header bg-white" >
    <button class="text-white button1 bg-[#557b97] m-0 md:m-11 lg:m-11"><a href="{{Route('technologies.index')}}">lire</a></button>
    </div>


@endsection
