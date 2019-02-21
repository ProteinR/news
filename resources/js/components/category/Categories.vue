<template>
    <span class="">
        <a class="dropdown-item" :href="'http://localhost/api/news/category/'+category.id" v-for="category in categories">{{ category.title }}</a>
    </span>
</template>

<script>
    export default {
        name: "Categories",
        props: ['categories']
    }
</script>

<style scoped>

</style>