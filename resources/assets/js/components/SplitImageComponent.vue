<template>
    <div class="row split-image-div">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 splitImageMechanic1" style="margin-bottom: 10px; padding:0;">
            <h2 class="split-image-text">{{ text1 }}</h2>
            <div class="overlay-coolsage"></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 splitImageMechanic2" style="margin-bottom: 10px; padding:0;">
            <h2 class="split-image-text">{{ text2 }}</h2>
            <div class="overlay-sienna"></div>
        </div>
    </div>

</template>

<script>

    export default {
    	props: ['text1','text2','image1','image2'],
        mounted() {
            console.log('component has been mounted')
        }
    }
</script>
