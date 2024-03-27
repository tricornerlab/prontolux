@extends('dashboard')
@section('content')


    <div dusk="products-detail-component " class="mb-8">
        <div>
            <div class="flex items-center mb-3 mx-12 text-primary">


                <h1 class="flex-auto truncate text-90 font-normal text-2xl text-accent">
                    Creer Produit:
                </h1>
                <div class="ml-3 flex items-center">
                    <div class="flex w-full justify-end items-center"></div>
                    <div class="ml-3"><!---->
                        <div class="v-portal" transition="fade-transition" style="display: none;"></div>
                    </div>
                </div>
            </div>


            {{-- PRODUCT CARD           --}}
                    {{-- main image           --}}

                    <div class="card bg-white rounded-xl mx-12 text-primary">
                        <div class="flex border-b border-40 ">
                            <div class="px-8 py-6 w-1/5">
                                <label for="image" class="inline-block text-80 pt-2 leading-tight">
                                    image&nbsp;<!---->
                                </label>
                            </div>
                            <div class="py-6 px-8 w-4/5">
                                <!--BUTTON-->
                                <span class="form-file mr-4">
                                    <input dusk="image" type="file" id="file-products-image" name="name" accept="image/*" class=" form-file-input select-none btn-primary">
                                    <label for="file-products-image" class=" btn-large py-1.5">
                                        <span>Choose File</span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        {{-- name           --}}
                        <div class="flex border-b border-40">
                            <div class="px-8 py-6 w-1/5">
                                <label for="name" class="inline-block text-80 pt-2 leading-tight">
                                    Nom&nbsp;<!---->
                                </label>
                            </div>
                        {{-- name window   --}}
                            <div class="py-6 px-8 w-1/2">
                                <input id="Nom" type="text" placeholder="Nom" class="w-full form-control form-input form-input-bordered ml-0">
                            </div>
                        </div>
                        {{-- description           --}}
                        <div class="flex border-b border-40" resource-id="772">
                            <div class="px-8 py-6 w-1/5">
                                <label for="description" class="inline-block text-80 pt-2 leading-tight">
                                    Description&nbsp;<!----></label></div>
                            <div class="py-6 px-8 w-1/2"><input id="description" dusk="description" list="description-list" type="text" placeholder="Description" class="w-full form-control form-input form-input-bordered">
                                <!----> <!----> <!---->
                            </div>
                        </div>
                        {{-- category           --}}
                        <div class="flex border-b border-40" resource-id="772">
                            <div class="px-8 py-6 w-1/5">
                                <label for="categorie_id" class="inline-block text-80 pt-2 leading-tight">
                                    Categorie&nbsp;
                                </label>
                            </div>


                        {{--   cat window     --}}
                            <div class="py-6 px-8 w-1/2">
                                <input id="categorie_id" dusk="categorie_id" list="categorie_id-list" type="text" placeholder="Categorie" class="w-full form-control form-input form-input-bordered">
                            </div>
                    </div>

            <div class="flex border-b border-40" resource-id="772">
                <div class="px-8 py-6 w-1/5">
                    <label for="categorie_id" class="inline-block text-80 pt-2 leading-tight">
                        Icons<!---->
                    </label>
                </div>

                <div class="flex-col items-center py-2">
                    @foreach($icons as $icon)
                        <div class="flex ">
                            <input type="checkbox" class="checkbox ml-4 text-zinc-200 p-3 m-auto mr-8" data-testid="products-items-0-checkbox" dusk="772-checkbox">
                            <img src="/storage/{{$icon['icon_url']}}" class="w-8 h-8 rounded-md  my-1 p-1 cursor-pointer inline-flex ">
                            <div class="inline-flex text-center  my-1 p-1 px-2 w-60 text-primary">{{$icon['icon_info']}}</div>
                            <input type="text" class="inline-flex text-center  my-1 p-1 px-2 w-30 border rounded-md" label="additional info">
                        </div>
                    @endforeach
                </div>
            </div>



            <div class="flex border-b border-40">
                <div class="px-8 py-6 w-1/5">
                    <label for="techimage" class="inline-block text-80 pt-2 leading-tight">
                                    Image technique&nbsp;<!---->
                    </label>
                </div>
                <div class="py-6 px-8 w-4/5"><!----> <!---->
                    <span class="form-file mr-4">
                                    <input dusk="techimage" type="file" id="file-products-techimage" name="name" accept="image/*" class="form-file-input select-none">
                                    <label for="file-products-techimage" class="select-none btn-large py-1.5">
                                        <span>
                                            Choose File
                                        </span>
                                    </label>
                                </span> <span class="text-90 text-sm select-none">

    </span> <!----> <!----> <!----></div></div>
                        <div class="flex border-b border-40">
                            <div class="px-8 py-6 w-1/5">
                                <label for="photos" class="inline-block text-80 pt-2 leading-tight">
                                    Photometrie&nbsp;<!---->
                                </label>
                            </div>
                            <div class="py-6 px-8 w-4/5"><!----> <!---->
                                <span class="form-file mr-4">
                                    <input dusk="photos" type="file" id="file-products-photos" name="name" accept="image/*" class="form-file-input select-none">
                                    <label for="file-products-photos" class="py-1.5 btn-large">
                                        <span>
                                            Choose File
                                        </span>
                                    </label>
                                </span>

                                <span class="text-90 text-sm select-none">
                                </span> <!----> <!----> <!---->
                            </div>
                        </div>
                        <div class="flex border-b border-40">
                            <div class="px-8 py-6 w-1/5"><label for="installimage1" class="inline-block text-80 pt-2 leading-tight">
                                    Installation 1&nbsp;<!---->
                                </label>
                            </div> <div class="py-6 px-8 w-4/5"><!----> <!---->
                                <span class="form-file mr-4">
                                    <input dusk="installimage1" type="file" id="file-products-installimage1" name="name" accept="image/*" class="form-file-input select-none">
                                    <label for="file-products-installimage1" class="py-1.5 select-none  btn-large">
                                        <span>
                                            Choose File
                                        </span>
                                    </label>
                                </span>
                                <span class="text-90 text-sm select-none">

                                </span>

                            </div>
                        </div>
                        <div class="flex border-b border-40">
                            <div class="px-8 py-6 w-1/5">
                                <label for="installimage2" class="inline-block text-80 pt-2 leading-tight">
                                    Installation 2&nbsp;<!---->
                                </label></div>
                            <div class="py-6 px-8 w-4/5"><!----> <!---->
                                <span class="form-file mr-4">
                                    <input dusk="installimage2" type="file" id="file-products-installimage2" name="name" accept="image/*" class="form-file-input select-none">
                                    <label for="file-products-installimage2" class="py-1.5 select-none btn-large">
                                        <span>Choose File</span>
                                    </label>
                                </span>
                                <span class="text-90 text-sm select-none">

    </span> <!----> <!----> <!----></div></div>
                        <div class="flex border-b border-40 remove-bottom-border" resource-id="772">
                            <div class="px-8 py-6 w-1/5">
                                <label for="created_at" class="inline-block text-80 pt-2 leading-tight">
                                    Creé le&nbsp;<!----></label>
                            </div>
                            <div class="py-6 px-8 w-1/2">
                                <div class="flex items-center">
                                    <input data-v-3a46d74e="" type="hidden" placeholder="2022-08-12" class="w-full form-control form-input form-input-bordered flatpickr-input" dusk="created_at" name="Creé le" value="2022-08-08">
                                    <input class="w-full form-control form-input form-input-bordered form-control input" placeholder="2022-08-12" tabindex="0" type="text"> <!---->
                                </div> <!----> <!---->
                            </div>
                        </div>
                    </div>
        </div>
{{--        BUTTONS--}}
        <div class="flex items-center pt-4 pb-8">
            <a tabindex="0" class="text-primary dim cursor-pointer text-80 font-bold mr-10 ml-12 text-center pt-0">
                        Cancel
                    </a>
            <button type="button" class=" inline-flex items-center relative mr-3 btn-xl py-1.5 " dusk="update-and-continue-editing-button">
                <span class="">
                    Create & add another
                </span> <!---->
            </button>
            <button type="submit" class="inline-flex items-center relative btn-large pt-1 py-1.5" dusk="update-button">
                <span class="">
                    Create Product
                </span> <!---->
                    </button>
                </div>
                </form>
            </div>


@endsection
