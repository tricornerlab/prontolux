@extends('dashboard')
@section('content')

    @foreach($item as $product)
    <div dusk="products-detail-component " class="mb-8">
        <div>
            <div class="flex items-center mb-3 mx-12 text-primary">


                <h1 class="flex-auto truncate text-90 font-normal text-2xl text-accent">
                    Update Product:
                    {{$product['name']}}
                </h1>
                <div class="ml-3 flex items-center">
                    <div class="flex w-full justify-end items-center"></div>
                    <div class="ml-3"><!---->
                        <div class="v-portal" transition="fade-transition" style="display: none;"></div>
                    </div>
                </div>
            </div>


            {{-- PRODUCT CARD           --}}

            <div class="card bg-white rounded-xl mx-12 text-primary mb-8">
                <div class="flex border-b border-40 ">
                    <div class="px-8 py-6 w-1/5">

                        <label for="image" class="inline-block text-80 pt-2 leading-tight">
                            image&nbsp;<!---->
                        </label>
                    </div>

                    <div class="py-6 px-8 w-4/5">
                        <div class="mb-6">
                            {{--     IMAGE--}}
                            <div data-v-1c591609="" class="card relative card relative border border-lg border-50 rounded-lg overflow-hidden px-0 py-0" style="max-width: 320px;">
                                <img src="/storage/{{$product['image']}}" class="block w-full " draggable="false">
                            </div> <!---->
                            <p class="mt-3 flex items-center text-sm">
                                {{--  DELETE button    --}}
                                <button type="button" tabindex="0"
                                        class="cursor-pointer dim text-secondary font-bold inline-flex items-center"
                                        dusk="image-delete-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20"
                                         aria-labelledby="delete" role="presentation" class="bg-zinc-400" fill="#4099de">
                                        <path fill-rule="nonzero"
                                              d="M6 4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6H1a1 1 0 1 1 0-2h5zM4 6v12h12V6H4zm8-2V2H8v2h4zM8 8a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1z"></path>
                                    </svg>
                                    <span class="class ml-2 mt-1">
                                        Delete
                                    </span>
                                </button>
                            </p>
                            <div class="v-portal" style="display: none;">
                            </div>
                        </div> <!---->
                    {{--        BUTTON CHOOSE FILE                --}}
                        <span class="form-file mr-4">
                            <input dusk="image" type="file" id="file-products-image" name="name" accept="image/*" class="form-file-input select-none">
                            <label for="file-products-image" class=" btn-large select-none pt-1.5">
                                <span>
                                    Choose File
                                </span>
                            </label>
                        </span>
                        <span class="text-90 text-sm select-none">
                            {{--                                no file selected--}}
                        </span>
                        <!----> <!----> <!---->
                    </div>
                </div>
                <div class="flex border-b border-40">
                    <div class="px-8 py-6 w-1/5"><label for="name" class="inline-block text-80 pt-2 leading-tight">
                            Nom&nbsp;<!---->
                        </label>
                    </div>
                    <div class="py-6 px-8 w-1/2">
                        <input id="Nom" type="text" placeholder="Nom" class="w-full form-control form-input form-input-bordered">
                        <!----> <!---->
                    </div>
                </div>
                <div class="flex border-b border-40" resource-id="772">
                    <div class="px-8 py-6 w-1/5">
                        <label for="description" class="inline-block text-80 pt-2 leading-tight">
                            Description&nbsp;<!---->
                        </label></div>
                    <div class="py-6 px-8 w-1/2"><input id="description" dusk="description" list="description-list"
                                                        type="text" placeholder="Description"
                                                        class="w-full form-control form-input form-input-bordered">
                        <!----> <!----> <!----></div>
                </div>
                <div class="flex border-b border-40" resource-id="772">
                    <div class="px-8 py-6 w-1/5">
                        <label for="categorie_id" class="inline-block text-80 pt-2 leading-tight">
                            Categorie&nbsp;<!---->
                        </label>
                    </div>
                    <div class="py-6 px-8 w-1/2">
                        <input id="categorie_id" dusk="categorie_id" list="categorie_id-list"
                                                        type="text" placeholder="Categorie"
                                                        class="w-full form-control form-input form-input-bordered">
                        <!----> <!----> <!---->
                    </div>
                </div>
                <div class="flex border-b border-40">
                    <div class="px-8 py-6 w-1/5">
                        <label for="techimage" class="inline-block text-80 pt-2 leading-tight">
                            Image technique&nbsp;<!---->
                        </label>
                    </div>
                    <div class="py-6 px-8 w-4/5"><!----> <!---->
                        <span class="form-file mr-4"><input dusk="techimage"
                                                                                                     type="file"
                                                                                                     id="file-products-techimage"
                                                                                                     name="name"
                                                                                                     accept="image/*"
                                                                                                     class="form-file-input select-none">
                            <label for="file-products-techimage"
                                class=" btn-large pt-1.5 select-none text-center ">
                                <span>Choose File</span>
                            </label>
                        </span>
                        <span class="text-90 text-sm select-none">
                            {{--      no file selected--}}
                        </span> <!----> <!----> <!---->
                    </div>
                </div>
                <div class="flex border-b border-40">
                    <div class="px-8 py-6 w-1/5">
                        <label for="photos" class="inline-block text-80 pt-2 leading-tight">
                            Photometrie&nbsp;<!---->
                        </label>
                    </div>
                    <div class="py-6 px-8 w-4/5"><!----> <!---->
                        <span class="form-file mr-4">
                            <input dusk="photos"
                                                                                                     type="file"
                                                                                                     id="file-products-photos"
                                                                                                     name="name"
                                                                                                     accept="image/*"
                                                                                                     class="form-file-input select-none">
                            <label
                                for="file-products-photos"
                                class="btn-large pt-1.5  select-none">
                                <span>Choose File</span>
                            </label>
                        </span>
                        <span class="text-90 text-sm select-none">
                            {{--      no file selected--}}
                        </span> <!----> <!----> <!---->
                    </div>
                </div>
                <div class="flex border-b border-40">
                    <div class="px-8 py-6 w-1/5">
                        <label for="installimage1"
                                                        class="inline-block text-80 pt-2 leading-tight">
                            Installation 1&nbsp;<!---->
                        </label>
                    </div>
                    <div class="py-6 px-8 w-4/5"><!----> <!----> <span class="form-file mr-4"><input
                                dusk="installimage1" type="file" id="file-products-installimage1" name="name"
                                accept="image/*" class="form-file-input select-none">
                            <label
                                for="file-products-installimage1"
                                class="btn-large pt-1.5  select-none">
                                <span>Choose File</span>
                            </label>
                        </span>
                        <span class="text-90 text-sm select-none">
                            {{--      no file selected--}}
                        </span> <!----> <!----> <!---->
                    </div>
                </div>
                <div class="flex border-b border-40">
                    <div class="px-8 py-6 w-1/5">
                        <label for="installimage2"
                                                        class="inline-block text-80 pt-2 leading-tight">
                            Installation 2&nbsp;<!---->
                        </label>
                    </div>
                    <div class="py-6 px-8 w-4/5">
                        <!----> <!---->
                        <span class="form-file mr-4">
                            <input
                                dusk="installimage2" type="file" id="file-products-installimage2" name="name"
                                accept="image/*" class="form-file-input select-none">
                            <label
                                for="file-products-installimage2"
                                class="btn-large pt-1.5 ry select-none">
                                <span>Choose File</span>
                            </label></span>
                        <span class="text-90 text-sm select-none">
                        {{--      no file selected--}}
                        </span> <!----> <!----> <!---->
                    </div>
                </div>
                <div class="flex border-b border-40 remove-bottom-border" resource-id="772">
                    <div class="px-8 py-6 w-1/5">
                        <label for="created_at"
                                                        class="inline-block text-80 pt-2 leading-tight">
                            Creé le&nbsp;<!---->
                        </label>
                    </div>
                    <div class="py-6 px-8 w-1/2">
                        <div class="flex items-center">
                            <input data-v-3a46d74e="" type="hidden" placeholder="2022-08-12"
                                                              class="w-full form-control form-input form-input-bordered flatpickr-input"
                                                              dusk="created_at" name="Creé le" value="2022-08-08">
                            <input class="w-full form-control form-input form-input-bordered form-control input"
                                placeholder="2022-08-12" tabindex="0" type="text"> <!---->
                        </div> <!----> <!---->
                    </div>
                </div>
            </div>
        </div>

{{--        BUTTONS--}}
        <div class="flex items-center">
            <a tabindex="0" class=" font-bold text-primary dim cursor-pointer text-80 ml-20 mr-10">
                Cancel
            </a>
            <button type="button" class="btn-3xl  inline-flex items-center relative mr-3 text-white  bg-[#4099de] rounded-lg px-6 py-1"
                    dusk="update-and-continue-editing-button">
                <span class="">
                    Update &amp; Continue Editing
                </span> <!---->
            </button>
            <button type="submit" class="btn-xxl inline-flex items-center relative bg-[#4099de] rounded-lg text-white py-1 text-center"
                    dusk="update-button">
                <span class="">
                    Update Product
                </span> <!---->
            </button>
        </div>
        </form>
    </div>
    @endforeach

@endsection
