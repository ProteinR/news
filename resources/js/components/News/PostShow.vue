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
                        <img class="img-fluid" :src="post.image" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Data -->
                    <div class="news-data d-flex justify-content-between">
                        <a  class="deep-orange-text">
                            <h6 class="font-weight-bold"><i class="fas fa-utensils pr-2"></i>{{post.category.title}}</h6>
                        </a>
                        <p class="font-weight-bold dark-grey-text"><i class="fas fa-clock-o pr-2"></i>{{post.created_at}}</p>
                    </div>
                    <div class="news-data d-flex justify-content-between mb-2" >
                        <span><i class="far fa-eye"></i> {{post.views}}</span>
                    </div>


                    <span>Теги:</span>
                    <div class="tags d-inline-flex" v-for="tag in post.tags">
                        <a :href="'/news/tag/'+tag.id" class="font-weight-light text-dark ml-3 tag"
                           id="tag">{{tag.title}}</a>
                    </div>

                    <!-- Excerpt -->
                    <h3 class="font-weight-bold dark-grey-text mb-3"><a>{{ post.title}}</a></h3>

                    <p class="dark-grey-text mb-lg-0 mb-md-5 mb-4 post-text"><span v-html="post.text"></span></p>

                </div>

            </div>
            <div class="col-lg-4 col-md-4">
                <mostpopular></mostpopular>
            </div>
        </div>

        <hr>

        <comments :comments="post.comments" id="comments"
                  :newComment="newComment"
                  :addLike="addLike"
                  :updateComment="updateComment">
        </comments>

    </div>
</template>

<script>
    import Comments from "./comments";
    import mostpopular from "../mostPopular";
    export default {
        name: "PostShow",
        components: {Comments, mostpopular},
        props: ['post'],
        methods: {
            newComment: function (data) {
                this.post.comments.push(data);
            },

            addLike: function (data) {
                for (let i = 0; i < this.post.comments.length; i++) {
                    if (this.post.comments[i].id == data.id) {
                        this.post.comments[i].likes = data.likes;
                        console.log('likes incremented! '+this.post.comments[i].likes);
                    }
                }
            },

            updateComment: function (data) {
                for (let i = 0; i < this.post.comments.length; i++) {
                    if (this.post.comments[i].id == data.id) {
                        this.post.comments[i].text = data.text;
                        console.log('comment updated! '+this.post.comments[i].text);
                    }
                }
            }
        },
        mounted() {
        }
    }
</script>

<style scoped>
    .post-text >>> p {
        max-width: 100%;
    }

    .post-text >>> img {
        max-width: 100%;
    }

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