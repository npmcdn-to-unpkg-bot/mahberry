@extends('_includes.base')

@section('body')
    <?php
    $images = (new \Illuminate\Filesystem\Filesystem())->glob(getcwd().'/content'.$currentUrlPath.'/*.jpg');
    ?>

    <div class="container m-b-100" id="innerProduct">
        <div class="row m-b-30">
            <div class="col-md-8 col-md-offset-2 text-center">
                <a href="@url('/')">< back</a>

                @yield('product_body')
            </div>
        </div>

        <div class="row">
            @foreach($images as $i => $image)
                <?php
                $imageURL = str_replace(getcwd().'/content/products/', '', $image);
                ?>

                <div class="col-md-4">
                    <div class="imgContainer">
                        <img src="@url('products/'.$imageURL)" style="width: 100%">
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@stop