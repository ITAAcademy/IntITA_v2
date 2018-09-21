<template>
    <swiper :options="swiperOption">
        <swiper-slide v-for="(slide, index) in banners" :key="index">
            <a :href=slide.url target="_blank">
                <img :src=banner_path+slide.file_path>
            </a>
        </swiper-slide>
        <div class="swiper-scrollbar" slot="scrollbar"></div>
    </swiper>
</template>


<script>
    import 'swiper/dist/css/swiper.css'
    import { swiper, swiperSlide } from 'vue-awesome-swiper'

    export default {
        props: ['url', 'banner_path'],
        components: {
            swiper,
            swiperSlide
        },
        data() {
            return {
                slide: 0,
                sliding: null,
                banners:[],
                swiperOption: {
                    spaceBetween: 30,
                    centeredSlides: true,
                    autoplay: {
                        delay: 8000,
                        disableOnInteraction: false
                    },
                    scrollbar: {
                        el: '.swiper-scrollbar',
                        hide: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
            }
        },
        mounted() {
            this.getBanners();
        },
        methods: {
            getBanners: function () {
                axios.get(this.url)
                    .then((response) => {
                        this.banners = response.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
        }
    }
</script>

<style scoped>
    .swiper-slide {
        position: relative;
    }
    .swiper-slide img {
        width: 100%;
    }
</style>