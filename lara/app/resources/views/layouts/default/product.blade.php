@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')



{{--    HEADER GREY-BG--}}

    <div class="flex">
        {{--  BUTTONS  --}}
        <div class="inline-flex  m-auto md:ml-6 lg:ml-6">
            <a href="/products/{{$previous}}" class="rounded bg-accent w-18 h-8 m-2 p-1 text-white">Precedent</a>
            
            <a href="/products/{{$next}}" class="rounded bg-accent w-18 h-8 m-2 p-1 text-white hidden md:block lg:block">Suivant</a>
        </div>
@foreach($product as $item)
        {{--     HEADER   --}}
        <div class="header h-20 pt-8 inline-flex m-auto text-lg md:text-xl lg:text-xl ">
            <a class=" m-auto" href="/products/{{$item['id']}}"> {{$item['name']}}
            </a>
        </div>
        {{--    PRINT icon--}}
        <div class="inline-flex w-10 m-auto mr-6 hidden md:block lg:block">

            <button onclick="document.body.offsetHeight;window.print();" class=" " >
                    <img class="w-6 h-6 text-gray-300" src="/storage/img/siteicons/print-button.svg">
            </button>
        </div>
        <!--SUIVANT BUTTON-->
        <div class="m-auto md:ml-6 lg:ml-6">        
            <a href="/products/{{$next}}" class="rounded bg-accent w-18 h-8 m-2 p-1 text-white display:block md:hidden lg:hidden" >Suivant</a></div>
    </div>

    {{--MAIN--}}
    <div class="bg-white overflow-hidden shadow rounded-lg min-h-full">

    <div class=" md:inline-flex md:flex-row lg:inline-flex  w-full flex">

        <div class="flex-col md:w-3/4 lg:w-3/4">
            {{--CATEGORIES GRID--}}
          
            @foreach($categories as $cat)
                <h3 class=" h-20 pt-8 ml-1 md:mx-8 lg:mx-8 font-bold">
                    <a href="/products">Products</a>
                    <span class="text-green"> > </span>
                    @if (!empty($parentcat[0]))
                    <a href="/categories/{{$cat['parent_cat_id']}}">{{$parentcat[0] ??''}}</a>
                    <span class="text-green"> > </span>
                    @else
                    <a href="/categories/{{$cat['id']}}">{{$cat['cat_name']}}</a>
                    <span class="text-[#94ae0e]"> > </span>
                    @endif
                    {{--  {{$item['name']}}--}}
                </h3>
              
           @endforeach
           </div>

        


        {{-- ICONS  --}}
        <div class="inline-flex end pt-6 ml-1 flex-row pr-0  md:pr-4 lg:pr-4">
            @foreach($icons as $icon)
                <div class=" end">
                    <img class="w-10 h-10 md:m-{20px} p-1" src="/storage/{{$icon->icon_url}}" title="{{$icon->icon_info}}">
                    <p class="text-xs pl-2 text-gray-500 text-center">{{$icon->icon_value}}</p>
                </div>
            @endforeach
        </div>

    </div>
    
                {{-- PRODUCT IP       --}}
                <div class=" text-sm ml-1 md:mx-8 lg:mx-8 w-full mt-4">
                    {!!$item['description']!!}
                </div>

            {{--PRODUCT DESCRIPTION--}}
        <div class=" text-sm mx-0 md:mx-8 lg:mx-8 pt-0 md:pt-8">
            {!!$item['content']!!}
        </div>
@endforeach

                @foreach($files as $url)
                    <div class="flex inline-flex md:mt-4 ml-0 md:ml-8 lg:ml-8">
                       <img class="md:w-50 md:h-50 md:-4  columns-1 shadow rounded" src={{asset("storage/$url")}}>
                    </div>
                @endforeach



        {{--   TABLE     --}}

            <div class="grid grid-cols-2 mt-4 ml-8 ">
                <table class=" p-2">
                    <tbody class="shadow rounded-lg ">
                        @foreach($table as $group)
                            @foreach($group as $key => $item)
                                @if($key == 0)
                                    <tr class=" text-xs font-semibold bg-gray-50 rounded-lg text-center">
                                @else
                                    <tr class=" text-xs text-center">
                                @endif
                                        @foreach($item as $line)
                                        <td class="px-2">{{$line ??''}}</td>
                                        @endforeach
                                    </tr>

                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>


            {{--   DOWNLOAD     --}}
            <div class="grid grid-cols-2 my-4 ml-16 md:ml-7 lg:ml-7 w-full">
                <button class="w-50 h-50 m-4 shadow rounded bg-blue-50 text-center" href="/{{$tableurl}}">Telecharger fichier</button>
            </div>






    </div>
    </div>





@endsection
