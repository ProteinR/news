<template>
        <ul class="navbar-nav" v-if="Object.keys(this.currentuser).length == 0">
            <li :class="url.indexOf('/register') != -1? 'nav-item active' : 'nav-item '">
                <a href="/register" class="nav-link">Регистрация </a>
            </li>
            <li :class="url.indexOf('/login') != -1? 'nav-item active' : 'nav-item '">
                <a href="/login" class="nav-link">Войти</a>
            </li>
        </ul>
        <ul v-else class="navbar-nav nav-flex-icons">
            <li class="nav-item avatar dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <img :src="currentuser.avatar" id="avatar"
                         class="rounded-circle z-depth-0" alt="avatar image" size="50px">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
                    <a class="dropdown-item" :href="'/user/'+currentuser.id">Профиль</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" @click="logout()">Выход</a>
                </div>
            </li>
        </ul>

</template>

<script>
    export default {
        name: "NavbarUserComponent",
        // props: ['currentuser'],
        data: function () {
            return {
                currentuser: [],
                url: ''
            }
        },
        created() {
            if (localStorage.getItem('currentUser')) {
                this.currentuser = localStorage.getItem('currentUser');
                this.currentuser = JSON.parse((this.currentuser));
                // console.log(Object.keys(this.currentuser).length != 0);
            } else {
                this.currentuser = [];
            }
            this.url = window.location.pathname;
        },
        methods: {
            logout: function () {
                localStorage.removeItem("token");
                localStorage.removeItem("currentUser");
                location = "/";
            }
        }
    }
    // console.log('component cur user'+ currentuser);
</script>

<style scoped>
#avatar {
    height: 40px;
}
</style>