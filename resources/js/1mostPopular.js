// import News from './components/News.vue';
import {AXIOS} from './axios.global';


var newsIndex = new Vue ({
    el: '#mostpopular',
    data: {
        preloadedNews: [],
        categories: [],
        news: [],
    },
    components: {},
    created: function () {
        self = this;
        AXIOS.get('http://localhost/api/news')
            .then(function(response) {
                self.news = response.data;
                console.log(self.news);
            });
    }
});