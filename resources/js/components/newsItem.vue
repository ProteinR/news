<template>



    <div class="container">
        <!-- Section: Blog v.3 -->
        <section class="my-3">
            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-5 col-xl-4">

                    <!-- Featured image -->
                    <a v-bind:href="'http://localhost/news/'+post.id">
                        <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                            <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" alt="Sample image">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </a>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-7 col-xl-8">

                    <!-- Post title -->
                    <a v-bind:href="'http://localhost/news/'+post.id">
                        <h3 class="font-weight-bold mb-3 text-dark"><strong>{{ post.title }}</strong></h3>
                    </a>
                    <!-- Excerpt -->
                    <p class="dark-grey-text">
                        {{ post.text.substring(0, 100)+'...'  }}
                    </p>
                    <!-- Post data -->
                    <p>by <a class="font-weight-bold" :href="'/news/user/'+ post.user.id">{{post.user.name}}</a>,
                       19/04/2018 </p>
                    <div class="">
                        <span>Теги: </span>
                        <div class="tags d-inline-flex" v-for="tag in post.tags">
                            <a :href="'/news/tag/'+tag.id" class="font-weight-light text-dark ml-3 tag"
                               id="tag">{{tag.title}}</a>
                        </div>
                    </div>
                    <div class="">
                        <span class="mr-3">Категория: </span>
                        <div class="tags d-inline-flex">
                            <a  class="deep-orange-text">
                                <h6 class="font-weight-bold"><i class="fas fa-utensils pr-2"></i>{{post.category.title}}</h6>
                            </a>
                        </div>
                    </div>
                    <!-- Read more button -->
                    <a class="btn btn-primary btn-md" v-bind:href="'http://localhost/news/'+post.id">Читать</a>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <hr class="">



        </section>
        <!-- Section: Blog v.3 -->
    </div>



</template>

<script>
    export default {
        props: [
            'post'
        ],
        computed: {},
        methods: {

        }
    }
</script>

<style scoped>
    #tag {
        /*color: green !important;*/
    }

    .tags {
        list-style: none;
        margin: 0;
        overflow: hidden;
        padding: 0;
    }

    .tags li {
        float: left;
    }

    .tag {
        background: #eee;
        border-radius: 3px 0 0 3px;
        color: #999;
        display: inline-block;
        height: 26px;
        line-height: 26px;
        padding: 0 20px 0 23px;
        position: relative;
        margin: 0 10px 10px 0;
        text-decoration: none;
        -webkit-transition: color 0.2s;
    }

    .tag::before {
        background: #fff;
        border-radius: 10px;
        box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
        content: '';
        height: 6px;
        left: 10px;
        position: absolute;
        width: 6px;
        top: 10px;
    }

    .tag::after {
        background: #fff;
        border-bottom: 13px solid transparent;
        border-left: 10px solid #eee;
        border-top: 13px solid transparent;
        content: '';
        position: absolute;
        right: 0;
        top: 0;
    }

    .tag:hover {
        background-color: crimson;
        color: white;
    }

    .tag:hover::after {
        border-left-color: crimson;
    }
</style>