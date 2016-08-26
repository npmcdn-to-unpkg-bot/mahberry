@extends('_includes.base')

@section('body')
    <link rel="stylesheet" href="https://npmcdn.com/flickity@2.0/dist/flickity.css" media="screen">

    <style>
        .carousel {
            background: #EEE;
        }

        .carousel-cell {
            width: 100%;
            margin-right: 10px;
            background: #8C8;
            border-radius: 5px;
            counter-increment: carousel-cell;
        }
    </style>

    <?php
    $products = (new \Illuminate\Filesystem\Filesystem())->directories(
            getcwd().'/content/raw_products'
    );
    ?>

    <div class="container">

        <div class="carousel m-b-100" data-flickity='{ "wrapAround": true, "autoPlay": true }'>
            @foreach(range(1,5) as $i)
                <div class="carousel-cell">
                    <img src="@url('slider/'.$i.'.jpg')">
                </div>
            @endforeach
        </div>

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

    <script src="https://npmcdn.com/flickity@2.0/dist/flickity.pkgd.min.js"></script>
@stop