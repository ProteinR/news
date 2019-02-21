<template>
    <!--<div class="card mt-4">-->

        <!--&lt;!&ndash; Card image &ndash;&gt;-->
        <!--<div class="view overlay">-->
            <!--<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%28131%29.jpg" alt="Card image cap">-->
            <!--<a>-->
                <!--<div class="mask rgba-white-slight"></div>-->
            <!--</a>-->
        <!--</div>-->
        <!--&lt;!&ndash; Card content &ndash;&gt;-->
        <!--<div class="card-body">-->

            <!--&lt;!&ndash; Social shares button &ndash;&gt;-->
            <!--&lt;!&ndash;<a class="activator waves-effect waves-light mr-4"><i class="fas fa-share-alt"></i></a>&ndash;&gt;-->

            <!--&lt;!&ndash; Title &ndash;&gt;-->
            <!--<h5 class="card-title">{{post.title.substring(0, 40)}}</h5>-->
            <!--<hr>-->
            <!--&lt;!&ndash; Text &ndash;&gt;-->
            <!--<p class="card-text">{{ post.text.substring(0, 25) }}</p>-->
            <!--<div class="row">-->
                <!--<i class="fas fa-user-alt mr-2"></i>-->
                <!--<p>{{post.user.name}}</p>-->
            <!--</div>-->

            <!--<div class="row">-->
                <!--<div class="col-4`">-->
                    <!--&lt;!&ndash; Rating&ndash;&gt;-->
                    <!--<i class="far fa-thumbs-up ml-2">25 </i>-->
                    <!--<i class="far fa-thumbs-down ml-2">12 </i>-->
                <!--</div>-->

                <!--<div class="col-8">-->
                <!--&lt;!&ndash; Link &ndash;&gt;-->
                    <!--<a v-bind:href="'http://localhost/news/'+post.id" class="black-text d-flex-->
                                <!--justify-content-end"><h5>Читать далее <i-->
                        <!--class="fas-->
                                <!--fa-angle-double-right"></i></h5></a>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->

    <!--</div>-->


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

            <hr class="my-3">



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