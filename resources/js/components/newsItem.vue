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
                    <p>by <a class="font-weight-bold">Jessica Clark</a>, 19/04/2018 </p>
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