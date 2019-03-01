<template>

    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Профиль</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Контакты</a>
                    </li>
                    <li class="nav-item" v-if="editProfile()">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Редактировать профиль</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">Профиль пользователя</h5>
                        <h4 class="font-weight-bold">{{user.name}}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h6><strong>О пользователе</strong></h6>
                                <p>
                                    Web Designer, UI/UX Engineer
                                </p>
                                <h6><strong>Интересы</strong></h6>
                                <p>
                                    Indie music, skiing and hiking. I love the great outdoors.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6>Recent badges</h6>
                                <a href="#" class="badge badge-dark badge-pill">html5</a>
                                <a href="#" class="badge badge-dark badge-pill">react</a>
                                <a href="#" class="badge badge-dark badge-pill">codeply</a>
                                <a href="#" class="badge badge-dark badge-pill">angularjs</a>
                                <a href="#" class="badge badge-dark badge-pill">css3</a>
                                <a href="#" class="badge badge-dark badge-pill">jquery</a>
                                <a href="#" class="badge badge-dark badge-pill">bootstrap</a>
                                <a href="#" class="badge badge-dark badge-pill">responsive-design</a>
                                <hr>
                                <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                                <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                                <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="messages">
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                        </div>
                        <table class="table table-hover table-striped">
                            <tbody>
                            <tr>
                                <td>
                                    <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="edit">
                        <form role="form">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Имя</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" :value="user.name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" :value="user.email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Место работы</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">О себе</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Сайт</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="url" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Новый пароль</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Подтвердите пароль</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" value="11111122333">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="button" class="btn btn-success" value="Сохранить">
                                    <input type="reset" class="btn btn-danger" value="Отменить">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-1 text-center">
                <img :src="user.avatar" class="mx-auto img-fluid rounded-circle d-block" alt="avatar">
                <h6 class="mt-2">Upload a different photo</h6>
                <label class="custom-file">
                    <input type="file" id="file" class="form-control-file">
                    <span class="custom-file-control">Choose file</span>
                </label>
            </div>
        </div>
        <!--<div class="row">-->
            <!--<div class="col-md-12">-->
                <!--<h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Активность пользователя</h5>-->
                <!--<table v-if="user.comments" class="table table-sm table-hover table-striped" id="myTable">-->
                    <!--<tbody>-->
                        <!--<tr v-for="comment in user.comments">-->
                            <!--<td>-->
                                <!--<strong>{{user.name}}</strong> оставил комментарий к записи-->
                                <!--<strong><a :href="'/news/'+comment.news.id">{{comment.news.title}}</a>: </strong>-->
                            <!--</td>-->
                        <!--</tr>-->
                    <!--</tbody>-->

                <!--</table>-->
                <!--<table v-else class="table table-sm table-hover table-striped" >-->
                    <!--<tbody>-->
                        <!--<tr>-->
                            <!--<td>-->
                                <!--<strong>{{user.name}}</strong> <span>пока ничего не писал...</span>-->
                            <!--</td>-->
                        <!--</tr>-->
                    <!--</tbody>-->
                <!--</table>-->
            <!--</div>-->
        <!--</div>-->
        <div class="row">
            <template>
                <div class="container">
                    <!--<h1>{{ post.title}}</h1>-->

                    <!--Comments block-->
                    <div class="row flex-column">
                        <h2 class="my-3 align-self-center">Комментарии пользователя: </h2>
                        <div v-if="user.comments && user.comments.length" class="comments my-3">
                            <div class="comment my-3" v-for="(comment, index) in user.comments"
                                 v-if="index <= 2">
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
                                            <span class="date mx-3 blockquote-footer">к новости: <a
                                                    :href="'/news/'+comment.news.id"><span
                                                    class="font-italic">{{comment.news
                                                                                      .title}}</span></a></span>
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
                        <div v-else>
                            <h4>Пользователь ничего не писал...</h4>
                        </div>
                    </div>
                    <div class="row flex-column" v-if="user.news && user.news.length">
                        <h2 class="my-3 align-self-center">Статьи пользователя: </h2>

                        <div class="" v-for="post in user.news">
                            <!-- Card Light -->
                            <newsItem :post="post"></newsItem>
                            <!-- Card Light -->
                        </div>
                    </div>
                    <div class="row flex-column" v-else>
                            <h2 class="my-3 align-self-center">Статьи пользователя: </h2>
                            <!-- Card Light -->
                            <h4>Пользователь не писал статьи...</h4>
                            <!-- Card Light -->
                    </div>
                </div>
            </template>
        </div>
    </div>

</template>

<script>
    import newsItem from "./newsItem";
    import url from '../API.js';


    export default {
        props: [
            'user',
        ],

        components: {
            newsItem,
        },
        computed: {},
        methods: {
            editProfile: function () {
                let id = url.split('/').pop();
                // console.log(this.user);
                if (id == JSON.parse(localStorage.getItem('currentUser')).id) {
                    return true;
                }
                return false;
            },
        },
        created() {
            // console.log(this.user);
        },
    }
</script>

<style scoped>


</style>