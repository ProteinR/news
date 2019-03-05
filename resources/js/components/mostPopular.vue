<!--import newsItem from './components/newsItem.vue';-->

<template>
    <div class="">
        <h3>Самые читаемые</h3>
        <div class="singlenews" v-for="(post, index) in news" v-if="index <= 3">
            <div class="row my-3">

                <!-- Grid column -->
                <div class="col-md-3">

                    <!--Image-->
                    <div class="view overlay rounded z-depth-1 my-3">
                        <img class="img-fluid" :src="post.image"
                             alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-9">

                    <!-- Excerpt -->
                    <p class="font-weight-bold dark-grey-text">{{post.title}}</p>
                    <div class="d-flex justify-content-between">
                        <div class="col-11 text-truncate pl-0 mb-3">
                            <a :href="'/news/'+ post.id" class="dark-grey-text">{{post.text}}</a>
                        </div>
                        <a><i class="fas fa-angle-double-right"></i></a>
                    </div>

                </div>
                <!-- Grid column -->
            </div>
            <hr>
        </div>

    </div>

</template>

<script>
    import {AXIOS} from '../axios.global';

    export default {
        name: 'mostPopular',
        props: [

        ],
        data() {
            return {
                news: [],
                // currentUrl: '',
            }
        },
        components: {

        },
        computed: {},
        methods: {

        },
        created: function () {
            let self = this;
            AXIOS.get('http://localhost/api/news/top/5')
                .then(function(response) {
                    self.news = response.data;
                    console.log(self.news);
                });
        }
    }
</script>