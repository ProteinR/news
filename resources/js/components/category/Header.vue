<template>
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="/">News</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="nav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li :class="url == '/' ? 'nav-item active' : 'nav-item '">
                    <a class="nav-link" href="/">Главная
                                                 <!--<span class="sr-only">(current)</span>-->
                    </a>
                </li>
                <li :class="url.indexOf('/news/category/4') != -1? 'nav-item active' : 'nav-item '">
                    <a class="nav-link" :href="'http://localhost/news/category/4'">IT</a>
                </li>
                <li :class="url.indexOf('/news/category/1') != -1? 'nav-item active' : 'nav-item '">
                    <a class="nav-link" :href="'http://localhost/news/category/1'">Спорт</a>
                </li>
                <li :class="url.indexOf('/news/category/2') != -1? 'nav-item active' : 'nav-item '">
                    <a class="nav-link" :href="'http://localhost/news/category/2'">Авто</a>
                </li>

                <!-- Dropdown -->
                <li class="nav-item dropdown" id="allcategory" >
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">Категории</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <span class="">
                            <a class="dropdown-item" :href="'http://localhost/news/category/'+category.id" v-for="category in categories">{{ category.title }}</a>
                        </span>
                    </div>
                </li>

            </ul>
            <!-- Links -->

            <form class="form-inline">
                <div class="md-form my-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Поиск" aria-label="Search">
                </div>
            </form>
            <navbarUserComponent :currentuser = currentuser></navbarUserComponent>
        </div>
        <!-- Collapsible content -->
    </div>




</template>

<script>
    import NavbarUserComponent from "../NavbarUserComponent";

    export default {
        name: "Header",
        data: function() {
            return {
                // currentuser: this.currentuser,
                url: '',
            }
        },
        props: ['categories', 'currentuser'],
        components: {
            NavbarUserComponent
        },
        created() {
            this.url = window.location.pathname;
        }
    }

</script>

<style scoped>

</style>