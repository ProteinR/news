import News from './components/News.vue';
import url from './API.js';

var newsIndex = new Vue ({
    el: '#newsIndex',
    data: {
        preloadedNews: [],
        categories: []
    },
    components: {News},
    created: function () {
        
        console.log(url);
        if (url == '/') {
            console.log('url = /');
        }

        axios.get(url)
            .then(function(response) {
                newsIndex.preloadedNews = response.data;
                // console.log(app.preloadedNews);
            });
    }
});