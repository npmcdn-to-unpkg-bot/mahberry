@extends('_includes.base')

@section('body')
    <?php
    $products = (new \Illuminate\Filesystem\Filesystem())->directories(
            getcwd().'/content/raw_products'
    );
    ?>

    <div class="container">

        <div class="row">

            @foreach($products as $product)
                <div class="col-md-3 product">
                    <?php
                    $textFile = file_get_contents((new \Illuminate\Filesystem\Filesystem())->glob($product.'/*.txt')[0]);
                    $title = str_replace('#', '', strtok($textFile, "\n"));
                    $firstImage = (new \Illuminate\Filesystem\Filesystem())->glob($product.'/*.jpg')[0];
                    $imageURL = str_replace(getcwd().'/content/raw_products/', '', $firstImage);
                    ?>


                    <a href="#">
                        <div class="imgContainer">
                            <img src="@url('raw_products/'.$imageURL)" alt="{{$title}}">
                        </div>
                        <h5>{{$title}}</h5>
                    </a>

                </div>
            @endforeach

        </div>
    </div>


@stop