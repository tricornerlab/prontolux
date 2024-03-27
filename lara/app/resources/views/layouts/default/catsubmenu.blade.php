@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')

                @foreach($header as $id=>$cat)
{{--                <div class="header"><a href="{{Route('categories.show', $id)}}">{{$cat}}</a></div>--}}
                <div class="mt-0 bg-white overflow-hidden shadow rounded-lg">

                    {{-- categories line--}}
                    <div class="pt-4 ml-6 font-semibold md:ml-12 lg:ml-12">
                        <a href="/products" >Produits</a>
                        <span class="px-1 text-green">> </span>{{$cat}}</div>
                @endforeach
                    {{--  GRID CATEGORIES--}}
                    <div class="min-h-fit">
                    <div class="grid grid-cols-2 md:grid-cols-9 m-4 md:m-8 lg:m-8 mt-4">
                        @foreach($subcats as $subcat)
                            {{--  PRODUCTS ITEM1--}}
                            <div class="px-4">
                                <div class=" w-20 align-middle">
                                    <img  src="/storage/{{$subcat['image']}}" class="w-20 h-20 shadow-lg rounded-md">
                                       </img>
                                    <div class=" text-xs leading-3 font-semibold h-8 pt-3 text-center">
                                        <a href="/select/{{$subcat['id']}}" class=" text-gray-600 border-b-emerald-400">{{$subcat['cat_name']}}</a>
                                    </div>
                                </div>

    {{--                            <div class="ml-2 text-[13px] h-14 pt-1 md:ml-4 lg:ml-4">--}}
    {{--                              {{$product['description']}}--}}
    {{--                            </div>--}}
                            </div>
                        @endforeach
                    </div>
                    </div>

                    {{--  GRID PRODUCTS--}}
                    <div class="min-h-full">
                        <div class="grid grid-cols-2 md:grid-cols-4 m-4 md:m-8 lg:m-8">


                            @foreach($products as $product)
                                {{--  PRODUCTS ITEM1--}}
                                <div class="p-6 border rounded">
                                    <div class="">
                                        <img  src="/storage/{{$product['image'] ??''}}" class="w-40 h-40 mx-auto shadow-lg rounded-md">
                                        </img>
                                        <div class="ml-4 text-xs leading-3 font-semibold h-8 pt-3">
                                            <a href="/products/{{$product['id'] ??''}}" class=" text-gray-700 dark:text-white">{{$product['name'] ??''}}</a></div>
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
