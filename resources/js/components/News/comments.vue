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
                            <div class="excerpt ml-3 container-fluid">

                                <!-- Brief -->
                                <div class="brief d-inline-flex">
                                    <a class="name text-info"
                                       :href="'/user/'+comment.user.id"><strong>{{comment.user.name}}</strong></a>
                                    <div class="date mx-3 blockquote-footer">{{comment.created_at}}</div>
                                </div>
                                <div class="d-inline-flex float-right">
                                    <span v-if="currentuser != undefined " class="">
                                        <span class="btn-primary btn-sm mr-2" style="cursor: pointer;"
                                              v-if="currentuser.id==comment.user.id || comment_edit_delete"
                                              @click="editComment(comment.id,
                                              comment.text)">
                                            edit
                                        </span>
                                        <span class="btn-danger btn-sm" style="cursor: pointer;"
                                              v-if="currentuser.id==comment.user.id || comment_edit_delete"
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
                    <div v-if="has_next_page" class="btn btn-success container-fluid my-3" @click="moreComments">Больше комментариев..
                                                                                             .</div>

                    <!-- Comment -->
                    <!--<div class="row flex-column">-->
                        <div class="md-form md-outline">
                            <textarea type="text" id="form75" class="form-control" rows="3"
                                      placeholder="Введите текст" v-model="commentBody" >
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
    import * as toastr from "toastr";

    export default {
        name: "Comments",
        props: ['newComment', 'addLike', 'updateComment'],
        data: function () {
            return {
                comments: {},
                childComments: this.comments,
                commentBody: '',
                comment_id: '',
                is_editing: '',
                currentuser: CURRENT_USER,
                user_auth: USER_AUTH,
                current_user_role: '',
                comment_edit_delete: '', // true - if user can edit or delete comments (admin or moderator)
                comments_page: 2,
                has_next_page: false,
            }
        },
        methods: {
            moreComments: function() {
                self = this;
                AXIOS.get('/api/news/'+API.split('/').pop()+'/comments?page='+self.comments_page)
                    .then(function (response) {
                        self.comments = self.comments.concat(response.data);
                        // console.log(self.comments);
                        self.comments_page++;

                        if (response.headers['x-pagination-has-more-pages'] == 1) {
                            self.has_next_page = true;
                        } else {
                            self.has_next_page = false;
                        }

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },


            refreshComments: function() {
                self = this;
                AXIOS.get('/api/news/'+API.split('/').pop()+'/comments')
                    .then(function (data) {
                        self.comments = data.data;
                        // console.log(data.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

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
                        // self.refreshComments();
                        for (let i = 0; i < self.comments.length; i++) {
                            if (self.comments[i].id == response.data.id) {
                                self.comments[i].likes = response.data.likes;
                                console.log('likes incremented! '+self.comments[i].likes);
                            }
                        }
                        toastr.success('Успех!', 'Вы оценили комментарий');
                    })
                    .catch(function (error) {
                        console.log(error);
                        toastr.error('Упс!', 'Произошла какая-то ошибка!');
                    });
            },

            addComment: function () {
                var self=this;

                if (!self.user_auth) {
                    swal("Ошибка!", "Чтобы оставлять комментарии, вам необходимо авторизоватья!", "warning");
                    return;
                }

                if (self.is_editing == false) {
                    if (self.commentBody == '') {
                        toastr.error('Введите текст комментария!', 'Ошибка!');
                        return;
                    }

                    AXIOS.post('/api/comment', {
                        news_id: API.split('/').pop(),
                        text: this.commentBody,
                    })
                        .then(function (response) {
                            self.comments.push(response.data);
                            self.commentBody = '';
                            toastr.success('Успех!', 'Вы добавили комментарий');
                        })
                        .catch(function (error) {
                            console.log(error);
                            toastr.error('Упс!', 'Произошла какая-то ошибка!');
                        });
                } else  {
                    AXIOS.put('/api/comment/'+self.comment_id, {
                        news_id: API.split('/').pop(),
                        text: this.commentBody,
                    })
                        .then(function (response) {
                            self.refreshComments();
                            self.is_editing = false;
                            self.commentBody = '';
                            toastr.success('Успех!', 'Ваш комментарий был обновлён!');
                        })
                        .catch(function (error) {
                            console.log(error);
                            toastr.error('Упс!', 'Произошла какая-то ошибка!');
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
                        self.refreshComments();
                        toastr.success('Успех!', 'Комментарий был удалён');
                    })
                    .catch(function (error) {
                        console.log(error);
                        toastr.error('Упс!', 'Произошла какая-то ошибка!');
                    });
            },
        },
        created() {
            if (this.currentuser != '') {
                this.current_user_role = this.currentuser.roles[0].name;
            }
            if (this.current_user_role == 'admin' ||  this.current_user_role == 'moderator') {
                this.comment_edit_delete = true;
            } else {
                this.comment_edit_delete = false;
            }

            self = this;
            AXIOS.get('/api/news/'+API.split('/').pop()+'/comments')
                .then(function (data) {
                    self.comments = data.data;
                    // console.log(data.data);

                    if (data.headers['x-pagination-has-more-pages'] == 1) {
                        self.has_next_page = true;
                    } else {
                        self.has_next_page = false;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
</script>

<style scoped>
#commentator-avatar {
    height: 50px;
    width: auto;
}
</style>