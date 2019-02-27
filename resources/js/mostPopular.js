import News from './components/News.vue';
import {AXIOS} from './axios.global';


var newsIndex = new Vue ({
    el: '#mostpopular',
    data: {
        preloadedNews: [],
        categories: []
    },
    components: {News},
    created: function () {
        AXIOS.get('http://localhost/api/news')
            .then(function(response) {
                newsIndex.preloadedNews = response.data;
                // console.log(app.preloadedNews);
            });
    }
});