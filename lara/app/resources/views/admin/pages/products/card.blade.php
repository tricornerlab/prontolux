@extends('dashboard')
@section('content')

    @foreach($item as $product)
    <div dusk="products-detail-component " class="mb-8">
        <div>
            <div class="flex items-center mb-3 mx-12 text-primary">


                <h1 class="flex-auto truncate text-90 font-normal text-2xl text-accent">
                    Product Details:
                    {{$product['name']}}
                </h1>
                <div class="ml-3 flex items-center">
                    <div class="flex w-full justify-end items-center"></div>
                    <div class="ml-3"><!---->
                        <div class="v-portal" transition="fade-transition" style="display: none;"></div>
                    </div>

  {{-- FORMAT BUTTONS                    --}}
                    {{-- DELETE                   --}}
                    <button data-testid="open-delete-modal" dusk="open-delete-modal-button" title="Delete"
                            class="  mr-3 bg-white  btn-default">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="grey"
                             aria-labelledby="delete" role="presentation" class="text-primary text-80 bg-primary"
                             style="margin-top: -1px; margin-left: 11px;">
                            <path fill-rule="nonzero" fill="black"
                                  d="M6 4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6H1a1 1 0 1 1 0-2h5zM4 6v12h12V6H4zm8-2V2H8v2h4zM8 8a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1z"></path>
                        </svg>
                    </button>
                    <!----> <!----> <!---->
                    {{-- EDIT                 --}}
                    <a href="/admins/products/{{$product['id']}}/edit"
                                                         class="btn btn-default btn-icon bg-primary"
                                                         data-testid="edit-resource" dusk="edit-resource-button"
                                                         title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                             aria-labelledby="edit" role="presentation" class="fill-current text-white "
                             style="margin-top: 2px; margin-left: 11px;">
                            <path
                                d="M4.3 10.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H5a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM6 14h2.59l9-9L15 2.41l-9 9V14zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h6a1 1 0 1 1 0 2H2v14h14v-6z"></path>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- PRODUCT CARD           --}}
            <div class="card mb-6 py-3 px-6 bg-white mx-12 rounded-xl text-primary">
                <div class="flex border-b border-40 -mx-6 px-6">
                    <div class="w-1/4 py-4"><h4 class="font-normal text-80">
                            ID
                        </h4>
                    </div>
                    <div class="w-3/4 py-4 break-words"><p class="text-90 text-accent">
                        {{$product['id']}}
                        </p></div>
                </div>
                <div class="flex border-b border-40 -mx-6 px-6">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">
                            image
                        </h4>
                    </div>
                    <div class="w-3/4 py-4 break-words">
                        <div>
                            <div data-v-1c591609=""
                                 class="card relative card relative border border-lg border-50 overflow-hidden px-0 py-0 rounded-xl shadow-sm"
                                 style="max-width: 320px;">
                                <img src="/storage/{{$product['image']}}" class="block w-full" draggable="false">
                            </div> <!----> <!---->
                            <p class="flex items-center text-sm mt-3 ">
                                <a dusk="image-download-link" tabindex="0"  class="cursor-pointer dim text-secondary font-bold inline-flex items-center pt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                         aria-labelledby="download" role="presentation" class="text-secondary mr-2 inline-flex bg-primary" fill="blue">
                                        <path
                                            d="M11 14.59V3a1 1 0 0 1 2 0v11.59l3.3-3.3a1 1 0 0 1 1.4 1.42l-5 5a1 1 0 0 1-1.4 0l-5-5a1 1 0 0 1 1.4-1.42l3.3 3.3zM3 17a1 1 0 0 1 2 0v3h14v-3a1 1 0 0 1 2 0v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3z"></path>
                                    </svg>
                                    <span class="class mt-1 pl-2 inline-flex ">
                                        Telecharger
                                    </span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex border-b border-40 -mx-6 px-6">
                    <div class="w-1/4 py-4"><h4 class="font-normal text-80">Nom</h4></div>
                    <div class="w-3/4 py-4 break-words"><p class="text-90 text-accent">
                            {{$product['name']}}
                        </p></div>
                </div>
                <div class="flex border-b border-40 -mx-6 px-6">
                    <div class="w-1/4 py-4"><h4 class="font-normal text-80">Description</h4></div>
                    <div class="w-3/4 py-4 break-words"><p class="text-accent">
                            {{$product['description']}}
                        </p></div>
                </div>
                <div class="flex border-b border-40 -mx-6 px-6">
                    <div class="w-1/4 py-4"><h4 class="font-normal text-80">Categorie</h4></div>
                    <div class="w-3/4 py-4 break-words"><p class="text-90 text-accent">
                            {{$product['categorie_id']}}
                        </p></div>
                </div>
                <div class="flex border-b border-40 -mx-6 px-6">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">
                            Pictograms
                        </h4>
                    </div>
                    <div class="w-3/4 py-4 break-words">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-airplane" viewBox="0 0 16 16">
                                <path
                                    d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
{{--                TECH IMAGE--}}
                <div class="flex border-b border-40 -mx-6 px-6 pb-3">
                    <div class="w-1/4 py-4"><h4 class="font-normal text-80">Image technique</h4>
                    </div>
                    <div class="w-3/4 pt-4 break-words pb-14">
                        <div class="">
                            <div data-v-1c591609=""
                                 class="card relative card relative border border-lg border-50 overflow-hidden px-0 py-0"
                                 style="max-width: 320px;">
                                <img
                                    src="/storage/img/products/{{$product['id']}}/"
                                    class="block w-full" draggable="false">
                            </div> <!----> <!---->
                            <p class="flex items-center text-sm my-3">
                                <a dusk="techimage-download-link" tabindex="0" class="cursor-pointer btn-text inline-flex text-secondary font-bold items-center pt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                         aria-labelledby="download" role="presentation" class="fill-current mr-2 inline-flex items-center bg-primary">
                                        <path
                                            d="M11 14.59V3a1 1 0 0 1 2 0v11.59l3.3-3.3a1 1 0 0 1 1.4 1.42l-5 5a1 1 0 0 1-1.4 0l-5-5a1 1 0 0 1 1.4-1.42l3.3 3.3zM3 17a1 1 0 0 1 2 0v3h14v-3a1 1 0 0 1 2 0v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3z"></path>
                                    </svg>
                                    <span class="class mt-1 inline-flex items-center ">
                                        Download
                                    </span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

{{--          PHOTOMETRIC      TECH IMAGE--}}
                <div class="flex border-b border-40 -mx-6 px-6 pb-3">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">
                            Photometrie
                        </h4></div>
                    <div class="w-3/4 py-4 break-words mb-10">
                        <div>
                            <div data-v-1c591609=""
                                 class="card relative card relative border border-lg border-50 overflow-hidden px-0 py-0"
                                 style="max-width: 320px;">
                                <img src="./Product Details_ text1 _ Laravel_files/f1NOyjio5b9G6WgxECsZxtdKtSLdCN9XXwnSQSSa.jpg"
                                    class="block w-full" draggable="false"></div> <!----> <!---->
                            <p class="flex items-center text-sm mt-3"><a dusk="photos-download-link" tabindex="0"
                                                                         class="cursor-pointer dim text-secondary font-bold  inline-flex items-center pt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                         aria-labelledby="download" role="presentation" class=" mr-2 inline-flex items-center bg-blue-900">
                                        <path
                                            d="M11 14.59V3a1 1 0 0 1 2 0v11.59l3.3-3.3a1 1 0 0 1 1.4 1.42l-5 5a1 1 0 0 1-1.4 0l-5-5a1 1 0 0 1 1.4-1.42l3.3 3.3zM3 17a1 1 0 0 1 2 0v3h14v-3a1 1 0 0 1 2 0v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3z"></path>
                                    </svg>
                                    <span class="class mt-1 inline-flex items-center">
                                        Download
                                    </span></a></p>
                        </div>
                    </div>
                </div>

{{--                IMAGE 3--}}
                <div class="flex border-b border-40 -mx-6 px-6 pb-3">
                    <div class="w-1/4 py-4"><h4 class="font-normal text-80">Installation 1</h4></div>
                    <div class="w-3/4 py-4 break-words mb-10">
                        <div>
                            <div data-v-1c591609=""
                                 class="card relative card relative border border-lg border-50 overflow-hidden px-0 py-0"
                                 style="max-width: 320px;">
                                <img src="./Product Details_ text1 _ Laravel_files/oWD9zUS9AoAGvos8gI7KduZP037kaRhp624bo1Q4.jpg"
                                    class="block w-full" draggable="false">
                            </div> <!----> <!---->
                            <p class="flex items-center text-sm mt-3">
                                {{--                               BUTTON --}}
                                <a dusk="installimage1-download-link" tabindex="0" class="cursor-pointer dim text-secondary font-bold  inline-flex items-center pt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                         aria-labelledby="download" role="presentation" class="bg-primary mr-2 inline-flex items-center">
                                        <path
                                            d="M11 14.59V3a1 1 0 0 1 2 0v11.59l3.3-3.3a1 1 0 0 1 1.4 1.42l-5 5a1 1 0 0 1-1.4 0l-5-5a1 1 0 0 1 1.4-1.42l3.3 3.3zM3 17a1 1 0 0 1 2 0v3h14v-3a1 1 0 0 1 2 0v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3z"></path>
                                    </svg>
                                    <span class="class mt-1 inline-flex items-center">
                                        Download
                                    </span></a></p>
                        </div>
                    </div>
                </div>

{{--                IMAGE 4--}}
                <div class="flex border-b border-40 -mx-6 px-6 pb-3">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">
                            Installation 2
                        </h4>
                    </div>
                    <div class="w-3/4 py-4 break-words mb-10">
                        <div>
                            <div data-v-1c591609=""
                                 class="card relative card relative border border-lg border-50 overflow-hidden px-0 py-0"
                                 style="max-width: 320px;">
                                <img src="./Product Details_ text1 _ Laravel_files/A4S4hlVBuXqKSRjYBdboukeems7FHI4UTyLfxVqo.jpg"
                                    class="block w-full" draggable="false"></div> <!----> <!---->
                            <p class="flex items-center text-sm mt-3">
                                {{--                                BUTTON--}}
                                <a dusk="installimage2-download-link" tabindex="0"
                                                                         class="cursor-pointer dim text-secondary font-bold  inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                         aria-labelledby="download" role="presentation" class="bg-primary mr-2 inline-flex items-center">
                                        <path
                                            d="M11 14.59V3a1 1 0 0 1 2 0v11.59l3.3-3.3a1 1 0 0 1 1.4 1.42l-5 5a1 1 0 0 1-1.4 0l-5-5a1 1 0 0 1 1.4-1.42l3.3 3.3zM3 17a1 1 0 0 1 2 0v3h14v-3a1 1 0 0 1 2 0v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3z"></path>
                                    </svg>
                                    <span class="class mt-1 inline-flex items-center pt-1">
                                        Download
                                    </span></a></p>
                        </div>
                    </div>
                </div>
                <div class="flex border-40 -mx-6 px-6 remove-bottom-border">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">
                            Creé le
                        </h4>
                    </div>
                    <div class="w-3/4 py-4 break-words">
                        <p class="text-90 text-accent">
                        {{substr($product['created_at'], 0, 10)}}
                        </p>
                    </div>
                </div>
    @endforeach

@endsection
