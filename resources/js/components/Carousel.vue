<template>
    <div>
        <div class="carousel-title">
            {{title}}
        </div>
        <div class="line">
            <img :src=image>
        </div>
        <a type="submit" class="carousel-btn"  href="#form">
            {{ btn_title }}
        </a>
        <swiper :options="swiperOption">
            <div class="swiper-pagination" slot="pagination"></div>
            <swiper-slide v-for="(slide, index) in carousel" :key="index">
                <div class="description" v-html="slide[title_attr]"></div>
                <img :src=banner_path+slide.pictureURL>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
    import 'swiper/dist/css/swiper.css'
    import { swiper, swiperSlide } from 'vue-awesome-swiper'

    export default {
        props: ['url', 'banner_path', 'lg', 'title', 'image', 'btn_title'],
        components: {
            swiper,
            swiperSlide
        },
        data() {
            return {
                title_attr:'ua',
                slide: 0,
                sliding: null,
                carousel:[],
                swiperOption: {
                    spaceBetween: 30,
                    centeredSlides: true,
                    autoplay: {
                        delay: 8000,
                        disableOnInteraction: false
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
            }
        },
        mounted() {
            this.title_attr = 'text_'+this.lg;
            this.getCarousel();
        },
        methods: {
            getCarousel: function () {
                axios.get(this.url)
                    .then((response) => {
                        window.scrollTo(0, 0);
                        this.carousel = response.data;
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