@extends('dashboard')
@section('content')

    <div class="w-full " role="main">

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        {{$header}}<small>modify</small>
                    </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Page title <small>Page subtile </small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings one</a></li>
                                        <li><a href="#">Settings two</a></li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <!-- content starts here -->

                            <!-- content ends here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{--    COPIED FROM DASHBOARD--}}
    {{--MAIN SECTION--}}
    <section class="columns-1 bg-white  rounded-lg shadow-md m-4 mt-8 p-3 text-sm h-52 w-1/3">
        <div x-data="{ open: false }" class="">
            Product Title
        </div>
    </section>



    <section class="columns-1 bg-white rounded-lg h-3/4 mt-8 w-1/4 p-3 text-sm">
        <div class="">right side menu</div>
    </section>

    </div>

@endsection
