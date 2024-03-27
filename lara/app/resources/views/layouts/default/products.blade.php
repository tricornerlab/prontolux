@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')

<div class="  mt-4 ml-4 w-8">
            
    {{--  SANDWICH              --}}
                <label id="hamburger" for="hamburger-input" class="md:hidden lg:hidden ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#3d4246" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </label>
     {{--  SANDWICH MENU  --}}
    <input type="checkbox" id="hamburger-input" class=" " />
    <ul class="nav-menu text-base font-semibold  ">
        @foreach($sections as $link=>$section)
            <li class="py-1 " id="nav"><a href="/{{$link}}" class="">{{$section}}</a></li>
        @endforeach
    </ul>
    </div>

                @foreach($header as $id=>$cat)
                <div class="header text-lg md:text-xl lg:text-xl"><a href="{{Route('categories.show', $id)}}">{{$cat}}</a></div>
                <div class="md:mt-8 lg:mt-8 bg-white overflow-hidden shadow rounded-lg">

                    {{-- categories line--}}
                    <div class="pt-4 ml-12 font-semibold ">
                        <a href="/products" >Produits</a>
                        <span class="px-1 text-amber-300 ">></span>{{$cat}}</div>
                @endforeach
                    {{--  GRID--}}
                    <div class="min-h-full">
                    <div class="grid grid-cols-1 md:grid-cols-4 m-8">


                        @foreach($products as $product)
                        {{--  PRODUCTS ITEM1--}}
                        <div class="p-6 border rounded">
                            <div class="">
                                <img  src="/storage/{{$product['image']}}" class="w-40 h-40 mx-auto shadow-lg rounded-md">
                                   </img>
                                <div class="ml-4 text-xs leading-3 font-semibold h-8 pt-3">
                                    <a href="/products/{{$product['id']}}" class=" text-gray-700">{{$product['name']}}</a></div>
                                </div>

                            <div class="ml-4 text-[13px] h-14 pt-1">
                              {!!$product['description']!!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>


@endsection
