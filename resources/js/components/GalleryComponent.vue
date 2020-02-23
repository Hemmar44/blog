<template>
    <div>
        <gallery :images="pictures" :index="index" @close="index = null"></gallery>
        <div
                class="image"
                v-for="(image, imageIndex) in pictures"
                :key="imageIndex"
                @click="index = imageIndex"
                :style="{ backgroundImage: 'url(' + image + ')', width: '300px', height: '200px' }"
        ></div>
    </div>
</template>

<script>
    import VueGallery from 'vue-gallery';

    export default {
        data: function () {
            return {
                index: null
            };
        },
        computed: {},
        props: ['pictures'],

        components: {
            'gallery': VueGallery
        },
    }
</script>

<style scoped>
    .image {
        float: left;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        border: 1px solid #ebebeb;
        margin: 5px;
    }
</style>
