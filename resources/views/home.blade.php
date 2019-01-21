@extends('layouts.app')

@section('homeContent')

    <div id="carouselIndicators" class="carousel-fade slide" data-ride="carousel" data-pause="false">
        <ol class="carousel-indicators">
            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselIndicators" data-slide-to="1"></li>
            <li data-target="#carouselIndicators" data-slide-to="2"></li>

        </ol>
        <div class="carousel-inner">
            <div class="item active bg1"></div>
            <div class="item bg2"></div>

        </div>
        <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

<div class="row title-div">
    <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: white; color:#2b2b2d; height: 100%;">
        <h1 style="margin-top: 0" class="center center-title">FEATURED BIKES</h1>
    </div>
</div>

<thumbnails-component
    name1 = 'MASI Evoluzione Ultegra'
    image1='/images/bikes/road/raw/Masi Evoluzione Ultegra.jpg'
    name2 = 'MASI Evoluzione 105'
    image2='/images/bikes/road/raw/Masi Evoluzione 105.jpg'
    name3 = 'MASI Vivo Due'
    image3='/images/bikes/road/raw/Masi Vivo Due.jpg'
    button='Explore'
    link='/bikes'
></thumbnails-component>

<!--
<div class="row">
    <div class="col-md-12">
          <img src="/images/featured/promo.jpg" alt="promo" style="width:100%">
    </div>
</div> -->
<div class="row div-display-image" style="height: 100%;">
    <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #252621; color:#2b2b2d; height: 100%;">
        <img src="/images/Speciale Sprint 2017_crystal.png" alt="promo" class="div-image-left">
        <h1 class="div-text-right">Introducing MASI Bikes Italy<br> to the Philippines</h1>
    </div>
</div>

<split-image-component
    text1 = 'Excellence'
    image1='/images/shop/mechanic.jpg'
    text2 = 'Quality'
    image2='/images/shop/mechanic(1).jpg'
></split-image-component>

<div class="row title-div">
    <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: white; color:#2b2b2d; height: 100%;">
        <h1 style="margin-top: 0" class="center center-title">GEARS AND APPARELS</h1>
    </div>
</div>

<thumbnails-component
    name1 = 'Helmets'
    image1='/images/helmets/Mountain Peak orange blue (1).jpg'
    name2 = 'Gloves'
    image2='/images/apparels/41990464_1402581146541846_8057684897306771456_n.jpg'
    name3 = 'Shoes'
    image3='/images/shoes/Giro Empire Acc blk wht eu 42 us men 9 (2).jpg'
    button='Explore'
    link='/apparels'
></thumbnails-component>


<footer-component></footer-component>
@endsection
