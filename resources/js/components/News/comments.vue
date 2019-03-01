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
                                     class="rounded-circle z-depth-1-half" id="commentator-avatar">
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
                                        <span v-if="comment.likes > 0" @click="incrementLikes(comment.id)">
                                            {{comment.likes}}likes
                                        </span>
                                        <span v-else @click="incrementLikes(comment.id)">

                                        </span>
                                    </a>
                                </div>

                            </div>
                            <!-- Excerpt -->
                        </div>
                        <hr>
                    </div>
                    <!-- Comment -->
                    <!--<div class="row flex-column">-->
                        <div class="md-form md-outline">
                            <textarea type="text" id="form75" class="form-control" rows="3"
                                      placeholder="Введите текст" v-model="commentBody">
                            </textarea>
                        <button class="btn btn-primary" @click="addComment()">Оставить комментарий</button>
                    </div>

                </div>
            </div>
    </div>
</template>

<script>
    import {USER_AUTH} from "../../axios.global";
    import {AXIOS} from "../../axios.global";
    import API from "../../API";
    import {CURRENT_USER} from "../../axios.global";

    export default {
        name: "Comments",
        props: ['comments', 'newComment', 'addLike'],
        data: function () {
            return {
                commentBody: '',
            }
        },
        methods: {
            incrementLikes: function(comment_id) {
                var self=this;
                // console.log(comment_id);
                AXIOS.post('/api/comment/'+comment_id, {
                    news_id: API.split('/').pop(),
                    text: this.commentBody,
                })
                    .then(function (response) {
                        self.addLike(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            addComment: function () {
                var self=this;

                AXIOS.post('/api/comment', {
                    news_id: API.split('/').pop(),
                    text: this.commentBody,
                })
                    .then(function (response) {
                        self.newComment(response.data);
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>
#commentator-avatar {
    height: 50px;
    width: auto;
}
</style>