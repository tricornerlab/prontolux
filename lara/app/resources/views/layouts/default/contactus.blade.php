@extends('welcome')


{{--MAIN SECTION CONTENT THAT WE INSERT INTO DEFAULT.BLADE.PHP--}}
@section('content')

                {{--    HEARDER--}}
                <div class="text-lg text-center text-black pt-8 pb-0 header">Contactez-nous et nos experts </div>
                <div class="text-lg  text-center text-black pt-1 header">pourront repondre aux tous vos questions</div>


                {{--        FORM --}}
                <div class="mt-8 overflow-hidden shadow rounded-lg h-full ">
                <section class="flex inline-flex pr-4">
                    <div class=" px-8 md:w-2/3 lg:w-2/3 h-full ">

                        <form class=" m-auto md:w-2/3 lg:w-2/3 pb-32 md:pb-0 lg:pb-0" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            {{--     MESSAGE--}}
                            @if(Session::has('success'))
                                <p class=" text-green ml-3">{{Session::get('success')}}</p>
                            @endif
                            <input class="bg-white w-full border-none rounded shadow-lg h-8 m-2 mt-0 text-sm text-gray-600" type="text" placeholder="  Nom*" name="name" id="name">
                            <input class="bg-white w-full border-none rounded shadow-lg h-8 m-2 text-sm" type="email" placeholder="  E-mail*" name="email" id="email" >
                            <input class="bg-white w-full border-none rounded shadow-lg h-8 m-2 text-sm" type="text" placeholder="  Companie" name="companie" id="company">

                            <p class="text-xs text-gray-500 p-2">Etes vous client existant?</p>
                            <div class="pl-5 text-xs text-gray-500 ">
                                <input class="rounded-full w-3 pb-2" type="radio" checked="checked" name="client" id="client" value="1">oui</input>
                                <input type="radio" class=" ml-4 w-3" name="client" id="client" value="0" unchecked">non</select>
                            </div>
                            <input class="bg-white w-full h-80 border-none rounded shadow-lg m-2 mb-0 text-sm" type="text" name="message" id="message"  placeholder=" Votre message*">
                            <button class="bg-accent w-full h-8 border-none rounded shadow-lg m-2 p-2 mb-5 md:mb-0 lg:mb-0 text-sm text-white mt-5 mb-10 " type="submit" name="send" value="Submit" >Envoyer</button>
                        </form>
                    </div>



                    {{--        PHOTOS --}}
                    <div class="bg-white  p-6 border-r border-b main  w-1/2 rounded shadow-lg hidden md:block lg:block">
                            <p class="font-semibold"> Rencontrez nottre equipe des experts et designers:</p>
                            <p class="text-xs py-4 text-gray-500">Support du lundi-vendredi 8.00 -16.00</p>
                            <hr class="pb-4 text-gray-300">
                            <section class="flex inline-flex m-auto  w-full">
                                @foreach($users as $user)
                                    <div class="p-2 m-auto">
                                            <img class="photo rounded-full bg-cover max-w-18  p-2 m-auto" src="storage/{{$user['avatar']}}">
                                        <p class="text-xs text-gray-500 text-center">{{$user['first_name']}} {{$user['name']}}</p>
                                    </div>


                                @endforeach

                    </section>
                    <div class="mt-8 ml-4 text-gray-500 text-xs">
                        <p>Vous pourriez nous contacter par e-mail: <span class="text-green">contact@prontolux.com</span></p>
                        <p class="mt-8">Adresse: Prontolux SA, 14 route de chêne, 1204 Genève</p>
                    </div>
                    </div>

 <div class="h-20 md:h-0 lg:h-0"></div>
                    </div>
                </div>
               




@endsection
