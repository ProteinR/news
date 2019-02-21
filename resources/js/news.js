import News from './components/News.vue';

var newsIndex = new Vue ({
    el: '#newsIndex',
    data: {
        preloadedNews: [],
        categories: []
    },
    components: {News},
    created: function () {
        axios.get('http://localhost/api/news')
            .then(function(response) {
                newsIndex.preloadedNews = response.data;
                // console.log(app.preloadedNews);
            });
    }
});