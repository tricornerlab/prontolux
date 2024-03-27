@extends('dashboard')
@section('content')

    <section class="pb-4">

        <div class=" font-semibold flex mx-8 my-4 ">
            {{--search window--}}
            <div class="flex-initial">
                <input type="text" class=" shadow rounded-3xl h-9 pl-2" placeholder="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-labelledby="search" role="presentation" fill="black" class="loop ml-3 form-search2"><path d="M14.32 12.906l5.387 5.387a1 1 0 0 1-1.414 1.414l-5.387-5.387a8 8 0 1 1 1.414-1.414zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path></svg>
            </div>
                {{-- button       --}}
            <div class=" ml-auto flex-1 ml-4 ">
                <a href="{{Route('products.create')}}" class="btn-large hover:antialiased pt-1.5" dusk="create-button">
                    Creer Produit
                </a>
            </div>
        </div>


        {{--white filter row--}}
        <div class="card bg-white text-zinc-500 my-16 mx-8 rounded-lg ">
            <div class="flex items-center py-3 border-b border-50 h-16">
                <div class="flex items-center">
                    <div class="px-3">
                        <div class="v-popover -mx-2" dusk="select-all-dropdown">
                            <div class="trigger" style="display: inline-block;">
                                <button type="button" class="rounded active:outline-none active:shadow-outline focus:outline-none focus:shadow-outline">
                                    <div class="dropdown-trigger h-dropdown-trigger flex items-center cursor-pointer select-none px-2">
                                        <input type="checkbox" disabled="disabled" class="checkbox pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" class="ml-2"><path fill="var(--90)" d="M8.292893.292893c.390525-.390524 1.023689-.390524 1.414214 0 .390524.390525.390524 1.023689 0 1.414214l-4 4c-.390525.390524-1.023689.390524-1.414214 0l-4-4c-.390524-.390525-.390524-1.023689 0-1.414214.390525-.390524 1.023689-.390524 1.414214 0L5 3.585786 8.292893.292893z"></path></svg>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center ml-auto px-3 ">
                    <!----> <!----> <!---->
                    <div>
                        <div class="filter-menu-dropdown">
                            <div class="v-popover" dusk="filter-selector">
                                <div class="trigger" style="display: inline-block;">
                                    <button type="button" class="rounded active:outline-none active:shadow-outline focus:outline-none focus:shadow-outline">
                                        <div class="dropdown-trigger h-dropdown-trigger flex items-center cursor-pointer select-none bg-30 px-3 border-2 border-30 rounded bg-[#e3e7eb] ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-labelledby="filter" role="presentation" class="fill-current text-80">
                                                <path fill-rule="nonzero" d="M.293 5.707A1 1 0 0 1 0 4.999V1A1 1 0 0 1 1 0h18a1 1 0 0 1 1 1v4a1 1 0 0 1-.293.707L13 12.413v2.585a1 1 0 0 1-.293.708l-4 4c-.63.629-1.707.183-1.707-.708v-6.585L.293 5.707zM2 2v2.585l6.707 6.707a1 1 0 0 1 .293.707v4.585l2-2V12a1 1 0 0 1 .293-.707L18 4.585V2H2z"></path></svg> <!---->

                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" class="ml-2 bg-[#e3e7eb]"><path fill="var(--90)" d="M8.292893.292893c.390525-.390524 1.023689-.390524 1.414214 0 .390524.390525.390524 1.023689 0 1.414214l-4 4c-.390525.390524-1.023689.390524-1.414214 0l-4-4c-.390524-.390525-.390524-1.023689 0-1.414214.390525-.390524 1.023689-.390524 1.414214 0L5 3.585786 8.292893.292893z"></path></svg>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                </div>
            </div>

            {{-- ID GREY ROW        --}}
            <div class="relative ">
                <div class="overflow-hidden overflow-x-auto relative " style="">
                    <table cellpadding="0" cellspacing="0" data-testid="resource-table" class="table w-full table-default pb-4">
                        <thead>
                        <tr class="text-[#7c858e] bg-[#e3e7eb] titlerow font-normal ">
                            <th class="w-16 px-1">&nbsp;</th>
                            <th class="text-left">
                                <span dusk="sort-id" class="cursor-pointer inline-flex items-center">
                                    ID
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" class="ml-2 flex-no-shrink">
                                    <path d="M1.70710678 4.70710678c-.39052429.39052429-1.02368927.39052429-1.41421356 0-.3905243-.39052429-.3905243-1.02368927 0-1.41421356l3-3c.39052429-.3905243 1.02368927-.3905243 1.41421356 0l3 3c.39052429.39052429.39052429 1.02368927 0 1.41421356-.39052429.39052429-1.02368927.39052429-1.41421356 0L4 2.41421356 1.70710678 4.70710678z" class="fill-60"></path>
                                        <path d="M6.29289322 9.29289322c.39052429-.39052429 1.02368927-.39052429 1.41421356 0 .39052429.39052429.39052429 1.02368928 0 1.41421358l-3 3c-.39052429.3905243-1.02368927.3905243-1.41421356 0l-3-3c-.3905243-.3905243-.3905243-1.02368929 0-1.41421358.3905243-.39052429 1.02368927-.39052429 1.41421356 0L4 11.5857864l2.29289322-2.29289318z" class="fill-60"></path>
                                    </svg>
                                </span>
                            </th>
                            <th class="text-center">
                                <span>
                                    image
                                </span>
                            </th>
                            <th class="text-left">
                                <span dusk="sort-name" class="cursor-pointer inline-flex items-center">
                                  Nom
                                 <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" class="ml-2 flex-no-shrink">
                                     <path d="M1.70710678 4.70710678c-.39052429.39052429-1.02368927.39052429-1.41421356 0-.3905243-.39052429-.3905243-1.02368927 0-1.41421356l3-3c.39052429-.3905243 1.02368927-.3905243 1.41421356 0l3 3c.39052429.39052429.39052429 1.02368927 0 1.41421356-.39052429.39052429-1.02368927.39052429-1.41421356 0L4 2.41421356 1.70710678 4.70710678z" class="fill-60"></path>
                                     <path d="M6.29289322 9.29289322c.39052429-.39052429 1.02368927-.39052429 1.41421356 0 .39052429.39052429.39052429 1.02368928 0 1.41421358l-3 3c-.39052429.3905243-1.02368927.3905243-1.41421356 0l-3-3c-.3905243-.3905243-.3905243-1.02368929 0-1.41421358.3905243-.39052429 1.02368927-.39052429 1.41421356 0L4 11.5857864l2.29289322-2.29289318z" class="fill-60"></path>
                                 </svg>
                                </span>
                            </th>
                            <th class="text-left">
                                <span>
                                    Description
                                </span>
                            </th>
                            <th class="text-left">
                                <span>Categorie</span>
                            </th>

                            <th class="text-left"><span>Creé le</span></th>
                            <th>Edit
                            </th>
                        </tr>
                        </thead>
                        <tbody>


                        {{--    Product row--}}
                        @foreach($paginator as $item)
                        <tr dusk="772-row">
                            <td class="w-16">
                                <input type="checkbox" class="checkbox ml-4 text-zinc-300" data-testid="products-items-0-checkbox" dusk="772-checkbox">
                            </td>
                            <td><div class="text-center">
                                    <a href="http://lara.localhost/nova/resources/products/772" class="no-underline dim text-primary font-bold">
                                                {{$item->id}}
                                    </a>
                                </div>
                            </td>
                            <td>
                                <p resource="[object Object]" class="text-center">
                                    <img src="/storage/{{$item->image}}" class="align-bottom w-16 h-16 rounded" style="object-fit: cover;">
                                </p>
                            </td>
                            <td>
                                <div class="text-left px-4" resource="[object Object]">
                                    <a href="{{Route('products.show', $item['id'])}}" class="whitespace-no-wrap no-underline dim text-secondary font-bold">
                                        {{$item->name}}
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="text-left text-left" resource="[object Object]">
                                    <span class="whitespace-no-wrap text-accent">
                                        {{substr($item->description, 0, 30)}}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="text-left text-center" resource="[object Object]">
                                    <span class="whitespace-no-wrap text-accent">
                                        {{$item->categorie_id}}
                                    </span>
                                </div>
                            </td>


                            <td><p resource="[object Object]" class="text-center">
                                    <span class="whitespace-no-wrap px-3">
                                        {{substr($item->created_at, 0, 10)}}
                                    </span>

                            </td>
                            {{--   CRUD ICONS--}}
                            <td class="td-fit text-right px-4 align-middle">
                                <div class="inline-flex items-center">
                                    <span class="inline-flex">
                                        <a href="{{Route('products.show', $item['id'])}}" class="cursor-pointer text-70 hover:text-primary mr-3 inline-flex items-center has-tooltip bg-[#e3e7eb]" data-testid="products-items-0-view-button" dusk="772-view-button" data-original-title="null">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 16" aria-labelledby="view" role="presentation" class="fill-current" fill="#4099de">
                                                <path d="M16.56 13.66a8 8 0 0 1-11.32 0L.3 8.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95-.01.01zm-9.9-1.42a6 6 0 0 0 8.48 0L19.38 8l-4.24-4.24a6 6 0 0 0-8.48 0L2.4 8l4.25 4.24h.01zM10.9 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="inline-flex">
                                        <a href="http://lara.localhost/nova/resources/products/772/edit?viaResource&amp;viaResourceId&amp;viaRelationship" class="inline-flex cursor-pointer text-70 hover:text-primary mr-3 has-tooltip bg-[#4099de]" dusk="772-edit-button" data-original-title="null">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-labelledby="edit" role="presentation" class="fill-current">
                                                <path d="M4.3 10.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H5a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM6 14h2.59l9-9L15 2.41l-9 9V14zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h6a1 1 0 1 1 0 2H2v14h14v-6z">

                                                </path>
                                            </svg>
                                        </a>
                                    </span>
                                    <button data-testid="products-items-0-delete-button" dusk="772-delete-button" class="inline-flex appearance-none cursor-pointer text-70 hover:text-primary mr-3 has-tooltip bg-[#e3e7eb]" data-original-title="null">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-labelledby="delete" role="presentation" class="fill-current">
                                            <path fill-rule="nonzero" d="M6 4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6H1a1 1 0 1 1 0-2h5zM4 6v12h12V6H4zm8-2V2H8v2h4zM8 8a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1z">

                                            </path>
                                        </svg>
                                    </button>
                                    <!----> <!---->
                                </div>
                            </td>
                        </tr>

                        @endforeach


                </tbody>
                </table>
                </div>


                <div class="bg-20 rounded-b-lg bg-[#f6fbff] " per-page="25" resource-count-label="1-25 of 493" current-resource-count="25" all-matching-resource-count="493">
                    <nav class="flex justify-between items-center">
                        <button disabled="disabled" rel="prev" dusk="previous" class=" btn-link py-3 px-4 text-secondary opacity-50 font-bold">
                                    Previous
                        </button>
                        <span class="text-sm text-80 px-4">
                            1-25 of 493
                        </span>
                        <button rel="next" dusk="next" class=" btn-link py-3 px-4 text-secondary dim font-bold">
                            Next
                        </button>
                    </nav>
                </div>
            </div>
            </div>

    </section>



@endsection
