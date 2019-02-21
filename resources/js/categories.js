import Categories from './components/category/Categories.vue';

var header = new Vue ({
    el: '#vue-header',
    data: {
        categories: []
    },
    components: {Categories},
    created: function () {
        axios.get('http://localhost/api/category/')
            .then(function(response) {
                header.categories = response.data;
                // console.log(header.categories);
            });
    }
});