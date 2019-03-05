var app = new Vue({
        el: '#content',
        data: {
            news: [],
        },
        methods: {
            loadNews: function() {
                this.news = 'loading...';
                this.post = '';
                axios.get('http://localhost/api/news/')
                    .then(function(response) {
                        app.news = response.data;
                        console.log(app.news);
                    })
            },
        },
        beforeMount() {
            this.loadNews();
        },
    });
