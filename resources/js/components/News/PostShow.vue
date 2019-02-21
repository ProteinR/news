<template>
    <div class="container">
        <!--<h1>{{ post.title}}</h1>-->


        <!-- Grid row -->
        <div class="row justify-content-center">

            <!-- Grid column -->
            <div class="col-lg-8 col-md-8">

                <!-- Featured news -->
                <div class="single-news mb-lg-0 mb-4">

                    <!-- Image -->
                    <div class="view overlay rounded z-depth-1-half mb-4">
                        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Slides/1.jpg" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Data -->
                    <div class="news-data d-flex justify-content-between">
                        <a href="#!" class="deep-orange-text">
                            <h6 class="font-weight-bold"><i class="fas fa-utensils pr-2"></i>Culinary</h6>
                        </a>
                        <p class="font-weight-bold dark-grey-text"><i class="fas fa-clock-o pr-2"></i>27/02/2018</p>
                    </div>

                    <!-- Excerpt -->
                    <h3 class="font-weight-bold dark-grey-text mb-3"><a>{{ post.title}}</a></h3>
                    <p class="dark-grey-text mb-lg-0 mb-md-5 mb-4">{{post.text}}</p>

                </div>

            </div>
            <div class="col-lg-4 col-md-4"></div>
        </div>

        <hr>

        <h2 class="my-3">Comments</h2>

        <div class="row">

            <div class="comments">
                <div class="comment" v-for="comment in post.comments" style="display: flex;">
                    <!-- Fourth news -->

                            <!-- Label -->
                            <div class="label">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(18)-mini.jpg" class="rounded-circle z-depth-1-half">
                            </div>

                            <!-- Excerpt -->
                            <div class="excerpt ml-3">

                                <!-- Brief -->
                                <div class="brief d-inline-flex">
                                    <a class="name text-info"><strong>Lili Rose</strong></a>
                                    <div class="date mx-2">2 days ago</div>
                                </div>

                                <!-- Added text -->
                                <div class="added-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero inventore,
                                                        iste quas libero eius? Vitae sint neque animi alias sunt dolor, accusantium ducimus, non placeat
                                                        voluptate.</div>

                                <!-- Feed footer -->
                                <div class="feed-footer">
                                    <a class="like">
                                        <i class="fas fa-heart"></i>
                                        <span>7 likes</span>
                                    </a>
                                </div>

                            </div>
                            <!-- Excerpt -->

                    </div>
                    <!-- Fourth news -->
                </div>
            </div>

        </div>
</template>

<script>
    export default {
        name: "PostShow",
        props: ['post']
    }
</script>

<style scoped>

</style>