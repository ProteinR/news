var cat = new Vue({
        el: '#allcategory',
        data: {
            categories: [],
        },
        methods: {
            loadCategories: function() {
                this.categories = 'loading...';
                this.category = '';
                axios.get('http://localhost/api/category')
                    .then(function(response) {
                        cat.categories = response.data;
                        // delete app.news[0];
                        console.log(app.categories);
                    })
            },
        },
        beforeMount() {
            this.loadCategories();
        },
    });
