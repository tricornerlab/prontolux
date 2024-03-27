<html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prontolux</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!--<link rel="stylesheet" href="http://idistance.school/storage/css/app.css">-->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>

    <style>
        body { box-sizing: border-box; margin: 0; padding: 0;
            font-family: "Work Sans",sans-serif;!important; font-weight: 500;  color: #3d4246;}
        a:hover{color:darkgray;}
        a:active{color:darkgray;}
.announcement-bar{background-color: #94ae0e; height: 44px; color: white; font-weight: 500;    text-align: center; position: relative; font-size:17px; display: block; padding: 10px;}
        .site-header{font-size: 1rem;
            text-transform: uppercase; letter-spacing: .1em;    font-weight: 800;line-height: 1.2;}
        .grid{align-items: center; font-weight: 400; }
        .menu-item:active{border-bottom: 2px solid #94ae0e;  }
        .menu-item{font-family: "Work Sans",sans-serif; font-weight: 400; font-size: 1.6rem; line-height: 1.5;}
        nav{border-bottom: 1px solid #cbd5e0; height: 141px; }
        .footer, footer{ background-color: #f5f5f5; border-bottom: none; font-size: 12px;}
        /*footer{position: absolute; bottom: 0; width: 100%;}*/
        bg-grey-100{background-color: #f5f5f5;}
        .bg-accent{background-color: #94ae0e!important;}
        .text-green{color:#94ae0e;}
        input{border: 1px solid #cbd5e0; border-radius:20px; width: 120px; font-size:14px; height: 30px;}
        input:focus{ outline: none; border: 1px solid #94ae0e; padding-left:5px;}
        .grid1{justify-content: center; display: flex; flex-direction: row; }

        .header{letter-spacing: 0.04em; font-size:25px; font-weight: 600; line-height:1.2; color:#54585a;
            margin: auto; width: 100%; text-align: center; padding: 20px;

        }
        .banner{width: 100%; margin: auto;}
        .button1{ width: 81px; height: 43px; font-size: 14px;  text-transform: uppercase;   letter-spacing: .08em;     font-weight: 600;     border-radius: 2px;  background-color: #557b97; }
        .text-card{height: 220px;}
        .text-xs{font-size: 3px;}
        .bi-list{margin-top: -4px; min-width: 30px; cursor: pointer; margin-right: 10px;}
        li{}
        .bi-list:active{}
        .news{height: 560px;}
        .logo{width:190px; }
        #hamburger-input{display: none;}
        #hamburger-input:checked ~  ul{display:block; transition: 0.3s;}
        .nav-menu{background-color: rgb(255,255,255,0.7); width: 179.39px; height: auto; margin-left: 0; display: block; position: fixed;
            top:140px; left:50px; display: none; }
        select{background: transparent;}


        .ribbon .tail {
            height: 10px;
            overflow: hidden;
            position: relative;
        }
        .article .article-header .date {
            float: left;
            left: 0px;
            margin: 0px 5px 5px 0px;
            position: relative;
            top: 5px;
        }

        a.ribbon {
            color: #eee;
            cursor: pointer;
            text-decoration: none;
        }
        .ribbon {
            color: #eee;
            cursor: default;
            display: inline-block;
            text-align: center;
            width: 35px;
        }

        a, a:focus {
            color: rgba(0, 158, 184, 1);
            font-family: 'Helvetica Neue Light', HelveticaNeue-Light, 'Helvetica Neue', Helvetica, Arial, sans-serif;
            outline: none;
            text-decoration: none;
            -moz-transition: color .3s;
            -ms-transition: color .3s;
            -o-transition: color .3s;
            -webkit-transition: color .3s;
            transition: color .3s;
        }

        .photo{
            height: 150px;
            width: 150px;

        }

        .ribbon .top {
            border-bottom: solid 1px rgba(255, 255, 255, 0.6);
            -moz-border-radius: 1px 1px 0px 0px;
            -ms-border-radius: 1px 1px 0px 0px;
            -o-border-radius: 1px 1px 0px 0px;
            -webkit-border-radius: 1px 1px 0px 0px;
            border-radius: 1px 1px 0px 0px;
            font-size: 11px;
            padding: 4px 0;
            position: relative;
            text-transform: uppercase;
        }

        .ribbon .ribbon-piece {
            background-color: rgba(102, 102, 102, 1);
            -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            -ms-box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            -o-box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 0 0 5px rgb(0 0 0 / 20%);
            box-shadow: 0 0 5px rgb(0 0 0 / 20%);
            -moz-transition: background-color 0.5s ease-in;
            -ms-transition: background-color 0.5s ease-in;
            -o-transition: background-color 0.5s ease-in;
            -webkit-transition: background-color 0.5s ease-in;
            transition: background-color 0.5s ease-in;
        }
        .ribbon .bottom {
            font-size: 17px;
            padding: 5px 0;
        }

        .ribbon .tail {
            height: 10px;
            overflow: hidden;
            position: relative;
        }

        .ribbon .tail .left {
            left: -9px;
            -moz-transform: rotate(-25deg);
            -ms-transform: rotate(-25deg);
            -o-transform: rotate(-25deg);
            -webkit-transform: rotate(
                -25deg
            );
            transform: rotate(
                -25deg
            );
        }

        .ribbon .tail .left, .ribbon .tail .right {
            height: 10px;
            position: absolute;
            top: -10px;
            width: 50px;
        }

        .ribbon .tail .right {
            right: -9px;
            -moz-transform: rotate(25deg);
            -ms-transform: rotate(25deg);
            -o-transform: rotate(25deg);
            -webkit-transform: rotate(
                25deg
            );
            transform: rotate(
                25deg
            );
        }

        .search:active, input:active, search:focus{border:1px solid #94ae0e!important; margin-left: 2px!important; border-radius: 5px;}
        input[type=search]{border:1px solid #94ae0e!important; margin-left: 2px!important; border-radius: 10px;}

        @media print {
            #header, #footer { display: none; }
        }

    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
{{--SALES BANNER--D}}
<header id="header">
    <!--<div class="announcement-bar">Soldes sur spots</div>-->
    <!--<div class="h-5 w-10 absolute display:block">Soldes sur spots</div>-->

  {{--REGISTER LOGIN SECTION--}}
    <div class="w-60 h-3 ml-auto md:h-10 lg:h-10">
        @if (Route::has('login'))
            <div class="hidden px-5 pt-1.5 sm:block flex flex-row max-w-30">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700  underline ">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700  font-bold pt-4 justify-self-end">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 font-bold pt-4">Register</a>
                    @endif
                @endauth
                <select class="ml-2">
                    <option>fr</option>
                    <option>en</option>
                    <option>de</option>
                    <option>it</option>
                </select>
            </div>
        @endif

    </div>

    {{--TOP NAVIGATION 1--}}
  <nav class=" flex justify-items-stretch h-10 w-full ml-0 pb-2 mt-0 md:pb-4 lg:pb-4 md:hidden lg:hidden md:h-30 lg:h-30 bg-grey-500">
       

                {{--  SANDWICH              --}}
                <label id="hamburger" for="hamburger-input" class="inline-flex pt-1 pl-2 md:hidden lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#3d4246" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </label>
                <a href="/" class="site-header inline-flex pt-1" title="home">Produits</a>
                
                            {{--SEARCH--}}
                <div class=" inline-flex justify-self-end ml-16 mr-0 pr-0 end md:hidden lg:hidden rounded-xl">
                    @include('components.searchwindow')
                </div>
      
      </nav>
       {{--TOP NAVIGATION 2--}}
    <nav class="grid grid-cols-5 gap-2 gap-x-2 items-justify h-fit md:py-4 lg:py-4">

        <div class="site-header col-start-1 col-span-1 md:pl-4 lg:pl-4 pr-4 pt-0 mt-0">

            <div class="flex flex-row justify-start w-22 ml-0 logo">

                {{--  SANDWICH              --}}
                <label id="hamburger" for="hamburger-input" class="hidden md:block lg:block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#3d4246" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </label>
                <a href="/" class="site-header hidden lg:block md:block " title="home">Prontolux</a>
            </div>
        </div>
        <div class="col-span-3 grid1 grid-cols-3 text-xs py-2 md:pr-3 lg:pr-3">
            {{-- ALL PRODUCTS menu item --}}
            <div class=" menu-item text-xs md:text-sm lg:text-sm  text-center my-auto ml-1 hidden md:block lg:block">
                <a href="/products/">Produits</a>
            </div>

            {{--ALL PRODUCT CATEGORIES --}}
            @foreach($types as $id=>$cat)
                    <div class=" menu-item text-center font-semibold my-auto text-xs md:text-sm lg:text-sm md:px-2 lg:px-2 md:font-normal lg:font-normal ml-2">
                        <a href="{{Route('categories.show', $id)}}" class="">{{$cat}}</a>
                    </div>
            @endforeach

        </div>
        <div class="col-span-1 gap-4 grid1 justify-end mr-5 flex inline-flex mt-3">

            {{--SEARCH--}}
            <div class="grid1 inline-flex hidden md:block lg:block">
                @include('components/searchwindow')
            </div>    
                
            {{-- CART--}}
                <a class =" hidden md:block lg:block" href="#" title="cart"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="grey" class="bi bi-cart2 pl-2 pb-2 inline-flex " viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg></a>
            </div>
        </div>
    </nav>

    {{--  SANDWICH MENU  --}}
    <input type="checkbox" id="hamburger-input" class="" />
    <ul class="nav-menu text-xs font-semibold">
        @foreach($sections as $link=>$name)
            <li class="py-1 pl-2" id="nav"><a href="/{{$link}}">{{$name}}</a></li>
        @endforeach
    </ul>


  
</header>

{{--MAIN SECTION LINK from file default--}}
<div class="bg-gray-100 ">
    @yield('content')
</div>





{{--FOOTER--}}
<footer class="mx-auto w-full" id="footer">
    {{--    SITE NAV MENU--}}

    <div class="grid grid-cols-4 text-sm font-bold h-60 w-full md:w-3/4 lg:w-3/4 mx-auto">
        @foreach($footer as $title)
            <div class="grid-col-1 mx-auto px-3">
                <h6 class="md:mx-auto lg:m-auto text-center"><a href="{{URL::to('/')}}/{{$title['link']}}">{{$title['name']}}</a></h6>
                <div class="text-xs md:mx-auto lg:m-auto font-normal text-center hidden md:block lg:block">{{$title['description']}}</div>
            </div>
        @endforeach
    </div>






    <hr>
    {{--    PAYMENT OPTIONS--}}
    {{-- social icons   --}}
    <nav class="grid footer grid-cols-4 h-20 ">
        <div class="grid-col-1 grid1 justify-start ml-4">

            <div class="menu-item px-2 social">
                <a href="https://www.facebook.com/prontoluxlight"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg></a>
            </div>
            <div class="menu-item mx-2">
                <a href="https://instagram.com/prontolux_eclairagiste"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="grid-col-1 grid1"></div>
        <div class="grid-col-1 grid1"></div>

        {{--        payment icons--}}
        <div class="grid-col-1 grid1 justify-end mr-4">
            <div class="menu-item mx-1"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-paypal" viewBox="0 0 16 16">
                    <path d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z"/>
                </svg>
            </div>
            <div class="menu-item mx-1"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                    <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                </svg></div>
            <div class="menu-item mx-1 text-base">Mastercard</div>
        </div>
    </nav>

    {{--    COPYRIGHT--}}
    <div class="ml-6 pb-6"><a href="{{Route('/')}}">
        © 2021 Prontolux sa</a>
    </div>
</footer>

<!-- Yandex.Metrika counter -->
<div style="display:none;">
    <script type="text/javascript">
        (function(w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter10604188 = new Ya.Metrika({id:10604188, enableAll: true});
                }
                catch(e) { }
            });
        })(window, "yandex_metrika_callbacks");
    </script>
</div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/10604188" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>
