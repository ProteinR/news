<!--import newsItem from './components/newsItem.vue';-->

<template>
    <div class="container">
        <div class="row" v-if="news.length">
            <div class="" v-for="post in news">
                <!-- Card Light -->
                <newsItem :post="post"></newsItem>
                <!-- Card Light -->
            </div>
        </div>
    </div>

</template>

<script>
    import newsItem from "./newsItem";

    export default {
        props: [
            'news'
        ],
        components: {
            newsItem
        },
        computed: {},
        methods: {

        }
    }
</script>