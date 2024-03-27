@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')
                @foreach($header as $title=>$link)
                    <div class="header"><a href="{{$link}}">{{$title}}</a></div>




                    {{--MAIN--}}
                    <main class="mt-8 bg-white overflow-hidden shadow rounded-lg min-h-fit">

                        {{--  Categorie LINE  --}}
                        <div class="p-6 main font-bold">
                            <a href="/">Main</a>
                            <span class="text-green font-bold"> > </span> {{$title}}
                        </div>

                    {{--  SORTING--}}
                        <div class="inline-flex justify-center">
                            <a class="up pl-5 cursor-pointer" title="sort recent first" type="button" href="/techup">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                    <path d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                </svg>
                            </a>
                            <a class="down pl-4 cursor-pointer" title="sort oldest first" type="button" href="/techdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-sort-down-alt" viewBox="0 0 16 16">
                                    <path d="M3.5 3.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 12.293V3.5zm4 .5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z"/>
                                </svg>
                            </a>
                        </div>


                        @foreach($technologies as $technologie)
                        <div class="border-b pb-8">
                            <div class=" p-1 pt-3 md:p-6 flex ">

                                {{--   FLAG       --}}
                                <div class="min-w-10 h-20  ml-1 md:mr-4">
                                <a class="ribbon date" title="14th January 2014" href="#" itemprop="url">
                                        <div class="top ribbon-piece ">{{date("M", strtotime($technologie['created_at']))}}</div>
                                        <div class="bottom ribbon-piece">{{substr($technologie['created_at'], 2, 2)}}</div>
                                        <div class="tail">
                                            <div class="left ribbon-piece"></div>
                                            <div class="right ribbon-piece"></div>
                                        </div>
                                </a>
                                </div>

                                {{--   TITLE       --}}
                                <h5 class=" text-green m-auto mt-0 pl-2" >
                                    {!! $technologie['name'] !!}
                                </h5>
                            </div>
                            {{--   CONTENT       --}}
                            <img src="/storage/{{$technologie['image']}}" class="pl-1 m-auto h-45 md:h-80">
                            <div class="text-sm text-gray-600 m-2 md:px-8 pt-12 pb-2 md:pb-4 md:w-3/4 m-auto">{!! $technologie['content'] !!}</div>

                            <p class="text-xs text-center text-gray-400">posté le {{date('M d, Y', strtotime($technologie['created_at']))}} par <span  class="text-green ">prontolux</span></p>
                            <div class="inline-flex  w-full justify-center pt-4 pl-18 flex" >
                                {{--twitter--}}
                                <span data-href="http://twitter.com/share" class="share-twitter twitter-share-button  w-3 h-5" data-url="https://prontolux.com/technologies#" data-count="" data-size="" data-text="" data-initialized="true">
                                    <iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/tweet_button.html?url=https%3A%2F%2Fprontolux.blogspot.com%2F2012%2F12%2Fblog-post_16.html&amp;count=horizontal&amp;text=&amp;size=medium"></iframe></span>
                                {{--facebook--}}
                                <span class="share-facebook  w-3 h-5" data-url="https://prontolux.com/technologies#" data-count="" data-layout="" data-text="" data-initialized="true">
                                    <iframe class="" allowtransparency="true" frameborder="0" scrolling="no" src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fprontolux.blogspot.com%2F2012%2F12%2Fblog-post_16.html&amp;send=false&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;colorscheme=light">
                                    </iframe>
                                </span>

                            </div>
                        </div>
                        @endforeach
                @endforeach
                    </main>
                </div>




@endsection
