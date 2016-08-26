@extends('_includes.base')

@section('body')
    <link rel="stylesheet" href="https://npmcdn.com/flickity@2.0/dist/flickity.css" media="screen">

    <?php
    $products = (new \Illuminate\Filesystem\Filesystem())->directories(
            getcwd().'/content/products'
    );
    ?>

    <div class="container">

        <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": true, "pageDots": false }'>
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
                    $textFile = file_get_contents((new \Illuminate\Filesystem\Filesystem())->glob($product.'/*.md')[0]);
                    preg_match('/#(.*)/', $textFile, $matches);
                    $title = $matches[1];
                    $firstImage = (new \Illuminate\Filesystem\Filesystem())->glob($product.'/*.jpg')[0];
                    $imageURL = str_replace(getcwd().'/content/products/', '', $firstImage);
                    $url = str_replace(getcwd().'/content/','' , $product);
                    ?>

                    <a href="@url($url)">
                        <div class="imgContainer">
                            <img src="@url('products/'.$imageURL)" alt="{{$title}}">
                        </div>
                        <h5>{{$title}}</h5>
                    </a>

                </div>
            @endforeach

        </div>
    </div>

    <script src="https://npmcdn.com/flickity@2.0/dist/flickity.pkgd.min.js"></script>
@stop