<template>
    <div class="container">
        <!--<h1>{{ post.title}}</h1>-->


        <!--Comments block-->
        <div class="row flex-column">
                <h2 class="my-3 align-self-center">Comments</h2>
                <div class="comments my-3">
                    <div class="comment my-3" v-for="comment in comments">
                        <!-- Comment -->

                        <div class="comment-content d-flex">
                            <!-- Label -->
                            <div class="label">
                                <img :src="comment.user.avatar"
                                     class="rounded-circle z-depth-1-half">
                            </div>

                            <!-- Excerpt -->
                            <div class="excerpt ml-3">

                                <!-- Brief -->
                                <div class="brief d-inline-flex">
                                    <a class="name text-info"
                                       :href="'/user/'+comment.user.id"><strong>{{comment.user.name}}</strong></a>
                                    <div class="date mx-3 blockquote-footer">{{comment.created_at}}</div>
                                </div>

                                <!-- Added text -->
                                <div class="added-text">{{comment.text}}</div>

                                <!-- Feed footer -->
                                <div class="feed-footer mt-2">
                                    <a class="like">
                                        <i class="fas fa-heart"></i>
                                        <!--TODO add migration for likes comments table-->
                                        <span>7 likes</span>
                                    </a>
                                </div>

                            </div>
                            <!-- Excerpt -->
                        </div>
                        <hr>
                    </div>
                    <!-- Comment -->
                </div>
            </div>
    </div>
</template>

<script>
    export default {
        name: "Comments",
        props: ['comments']
    }
</script>

<style scoped>

</style>