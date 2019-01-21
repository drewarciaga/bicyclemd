<template>
    <div class="row thumbnails-div">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
            <div class="hovereffect">
                <a href="#">
                <img class="img-responsive" v-bind:src="image1" alt="featured">
                    <div class="overlay">
                        <h2>{{ name1 }}</h2>
                        <p>SHOW MORE</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
            <div class="hovereffect">
                <a href="#">
                <img class="img-responsive" v-bind:src="image2" alt="featured">
                    <div class="overlay">
                        <h2>{{ name2 }}</h2>
                        <p>SHOW MORE</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
            <div class="hovereffect">
                <a href="#">
                <img class="img-responsive" v-bind:src="image3" alt="featured">
                    <div class="overlay">
                        <h2>{{ name3 }}</h2>
                        <p>SHOW MORE</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="div-thumbnail-btn" align="center">
            <a class="btn-c" v-bind:href="link" >{{ button }} <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</template>

<script>

    export default {
    	props: ['name1','name2','name3','image1','image2','image3', 'button', 'link'],
        mounted() {
            console.log('component has been mounted')
        }
    }
</script>
