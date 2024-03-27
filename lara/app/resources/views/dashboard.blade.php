@extends('admin.app')
{{--DASHBOARD SECTION for app.blade.php--}}


    <section class="flex flex-none pt-header min-h-screen w-sidebar ">


        {{--    START OF SIDE MENU--}}
        <nav class="columns-1 border-r navbar bg-primary text-white min-h-screen ">
             <ul class="">
                    <li class="logo text-xs font-bold pl-8 cursor-pointer flex items-center dim mb-8 no-underline router-link-exact-active router-link-active bg-[#252d37]">Prontolux</li>

                @foreach($sections as $section)
                    <li class="pt-2 flex pl-6  left_col nav-item" style="border: 0;">
                        <ul class="pt-2 flex pl-6  left_col nav-item pb-0 font-normal text-white">
                            <img src= "/storage/{{$section['icon']}}" class=" w-4 mx-1" style="color:lightslategrey">
                            <a href="/admins/{{$section['link']}}" class="text-base place-self-start ml-2 ">{{$section['leftsection']}}</a>
                        </ul>
{{--                    @foreach($submenu as $sublink=>$subsection)--}}
{{--                        <li class="text-xs ml-24 text-gray-600"><a href="/admins/{{$sublink}}">{{$subsection}}</a></li>--}}
{{--                        @endforeach--}}
{{--                        </li>--}}
                @endforeach
            </ul>

        </nav>


        {{-- MAIN SECTION included from WELCOME.blade.php   --}}
        <main class=" main" >

            {{--COMPONENT 'HEADER' FOR APP.blade.php--}}
            <x-app-layout>
                <x-slot name="header">
                    <div class="font-normal text-2xl text-gray-600 text-90 leading-tight pt-12 pl-10">
                        {{$header}}
                    </div>


                    {{--            <div  class="mx-2 font-semibold"></div>--}}
                </x-slot>


            {{-- MAIN CONTENT   from admin/welcome.blade.php--}}

            @yield('content')

        </main>



        <footer class="sidebar-footer text-xs  text-center text-zinc-500 pb-16">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true">@ 2021 <span class="text-blue-400">Pronto</span> footer</span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </footer>

    </section>


</x-app-layout>




