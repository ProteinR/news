<!--import newsItem from './components/newsItem.vue';-->

<template>
    <div class="">
        <h3>Самые читаемые</h3>
        <div class="singlenews">
            <div class="row my-3">

                <!-- Grid column -->
                <div class="col-md-3">

                    <!--Image-->
                    <div class="view overlay rounded z-depth-1 my-3">
                        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/86.jpg" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-9">

                    <!-- Excerpt -->
                    <p class="font-weight-bold dark-grey-text">Title of post title of post</p>
                    <div class="d-flex justify-content-between">
                        <div class="col-11 text-truncate pl-0 mb-3">
                            <a href="#!" class="dark-grey-text">Itaque earum rerum hic tenetur a sapiente delectus</a>
                        </div>
                        <a><i class="fas fa-angle-double-right"></i></a>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <hr>
        </div>
        <div class="singlenews">
            <div class="row my-3">

                <!-- Grid column -->
                <div class="col-md-3">

                    <!--Image-->
                    <div class="view overlay rounded z-depth-1 my-3">
                        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/86.jpg" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-9">

                    <!-- Excerpt -->
                    <p class="font-weight-bold dark-grey-text">Title of post title of post</p>
                    <div class="d-flex justify-content-between">
                        <div class="col-11 text-truncate pl-0 mb-3">
                            <a href="#!" class="dark-grey-text">Itaque earum rerum hic tenetur a sapiente delectus</a>
                        </div>
                        <a><i class="fas fa-angle-double-right"></i></a>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <hr>
        </div>
        <div class="singlenews">
            <div class="row my-3">

                <!-- Grid column -->
                <div class="col-md-3">

                    <!--Image-->
                    <div class="view overlay rounded z-depth-1 my-3">
                        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/86.jpg" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-9">

                    <!-- Excerpt -->
                    <p class="font-weight-bold dark-grey-text">Title of post title of post</p>
                    <div class="d-flex justify-content-between">
                        <div class="col-11 text-truncate pl-0 mb-3">
                            <a href="#!" class="dark-grey-text">Itaque earum rerum hic tenetur a sapiente delectus</a>
                        </div>
                        <a><i class="fas fa-angle-double-right"></i></a>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <hr>
        </div>
        <div class="singlenews">
            <div class="row my-3">

                <!-- Grid column -->
                <div class="col-md-3">

                    <!--Image-->
                    <div class="view overlay rounded z-depth-1 my-3">
                        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/86.jpg" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-9">

                    <!-- Excerpt -->
                    <p class="font-weight-bold dark-grey-text">Title of post title of post</p>
                    <div class="d-flex justify-content-between">
                        <div class="col-11 text-truncate pl-0 mb-3">
                            <a href="#!" class="dark-grey-text">Itaque earum rerum hic tenetur a sapiente delectus</a>
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
    export default {
        props: [
            'news'
        ],
        data() {
            return {
                // currentUrl: '',
            }
        },
        components: {

        },
        computed: {},
        methods: {

        },
        created: function () {
            // this.currentUrl = window.location.href;
            // console.log(this.currentUrl);

            //     axios.get('http://localhost/api/news')
        //         .then(function(response) {
        //             newsIndex.preloadedNews = response.data;
        //             // console.log(app.preloadedNews);
        //         });
        }
    }
</script>