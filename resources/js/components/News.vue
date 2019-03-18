<!--import newsItem from './components/newsItem.vue';-->

<template>
    <div class="container">
        <div class="row" v-if="news.length">
            <div class="" v-for="post in news">
                <!-- Card Light -->
                <newsItem :post="post"></newsItem>
                <!-- Card Light -->
            </div>
            <div v-if="has_next_page" class="btn btn-success container-fluid my-3" @click="moreNews">Больше новостей...</div>
        </div>
    </div>

</template>

<script>
    import newsItem from "./newsItem";
    import {AXIOS} from '../axios.global';
    import url from '../API.js';


    export default {
        props: [
            'newsFromFind'
        ],
        components: {
            newsItem
        },
        data() {
            return {
                news: {},
                news_page: 2,
                has_next_page: false,
            }
        },
        computed: {},
        methods: {
            moreNews: function() {
                self = this;
                AXIOS.get('/api/news/'+'?page='+self.news_page)
                    .then(function (response) {
                        self.news = self.news.concat(response.data);
                        self.news_page++;

                        if (response.headers['x-pagination-has-more-pages'] == 1) {
                            self.has_next_page = true;
                        } else {
                            self.has_next_page = false;
                        }
                        // console.log(response.headers['x-pagination-has-more-pages']);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        },
        created() {
            self = this;
            AXIOS.get(url)
                .then(function(response) {
                    self.news = response.data;

                    if (response.headers['x-pagination-has-more-pages'] == 1) {
                        self.has_next_page = true;
                    } else {
                        self.has_next_page = false;
                    }
                    // console.log(response.headers['x-pagination-has-more-pages']);
                });
        }
    }
</script>