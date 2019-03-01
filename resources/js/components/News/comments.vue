<template>
    <div class="container">
        <!--<h1>{{ post.title}}</h1>-->


        <!--Comments block-->
        <div class="row flex-column">
                <h2 class="my-3 align-self-center">Comments</h2>
                <div class="comments my-3">
                    <div class="comment my-3" v-for="comment in childComments">
                        <!-- Comment -->

                        <div class="comment-content d-flex">
                            <!-- Label -->
                            <div class="label">
                                <img :src="comment.user.avatar"
                                     class="rounded-circle z-depth-1-half" id="commentator-avatar">
                            </div>

                            <!-- Excerpt -->
                            <div class="excerpt ml-3 container-fluid">

                                <!-- Brief -->
                                <div class="brief d-inline-flex">
                                    <a class="name text-info"
                                       :href="'/user/'+comment.user.id"><strong>{{comment.user.name}}</strong></a>
                                    <div class="date mx-3 blockquote-footer">{{comment.created_at}}</div>
                                </div>
                                <div class="d-inline-flex float-right">
                                    <span v-if="currentuser != undefined" class="">
                                        <span class="btn-primary btn-sm mr-2" style="cursor: pointer;"
                                              v-if="currentuser.id==comment.user.id" @click="editComment(comment.id,
                                              comment.text)">
                                            edit
                                        </span>
                                        <span class="btn-danger btn-sm" style="cursor: pointer;"
                                              v-if="currentuser.id==comment.user.id"
                                              @click="deleteComment(comment.id)">x
                                        </span>
                                    </span>
                                </div>

                                <!-- Added text -->
                                <div class="added-text">{{comment.text}}</div>

                                <!-- Feed footer -->
                                <div class="feed-footer mt-2">
                                    <a class="like" @click="incrementLikes(comment.id)">
                                        <i class="fas fa-heart"></i>
                                        <span  >
                                            <template v-if="comment.likes > 0">
                                                {{comment.likes}}
                                            </template>

                                            <template v-else>
                                            </template>
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
        props: ['comments', 'newComment', 'addLike', 'updateComment'],
        data: function () {
            return {
                childComments: this.comments,
                commentBody: '',
                comment_id: '',
                is_editing: '',
                currentuser: CURRENT_USER,
                user_auth: USER_AUTH,
            }
        },
        methods: {
            incrementLikes: function(comment_id) {
                var self=this;

                if (!self.user_auth) {
                    swal("Ошибка!", "Для этого действия, вам необходимо авторизоватья!", "warning");
                    return;
                }

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

                if (!self.user_auth) {
                    swal("Ошибка!", "Чтобы оставлять комментарии, вам необходимо авторизоватья!", "warning");
                    return;
                }

                if (self.is_editing == false) {
                    AXIOS.post('/api/comment', {
                        news_id: API.split('/').pop(),
                        text: this.commentBody,
                    })
                        .then(function (response) {
                            self.newComment(response.data);
                            self.commentBody = '';
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else  {
                    AXIOS.put('/api/comment/'+self.comment_id, {
                        news_id: API.split('/').pop(),
                        text: this.commentBody,
                    })
                        .then(function (response) {
                            self.updateComment(response.data);
                            self.is_editing = false;
                            self.commentBody = '';
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },

            editComment: function (id, text) {
                var self=this;
                console.log(text);
                self.is_editing = true;
                self.commentBody = text;
                self.comment_id = id;
            },

            deleteComment: function (id) {
                var self=this;

                AXIOS.delete('/api/comment/'+ id)
                    .then(function (response) {
                        // console.log(self.childComments);

                        self.childComments = self.childComments.filter(comment =>{
                            return comment.id !== id;
                        });
                        console.log(self.childComments);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        },
        created() {
            // console.log(this.childComments);
        }
    }
</script>

<style scoped>
#commentator-avatar {
    height: 50px;
    width: auto;
}
</style>