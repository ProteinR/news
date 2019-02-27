import News from './components/News.vue';
import url from './API.js';
import {AXIOS} from './axios.global';


var newsIndex = new Vue ({
    el: '#newsIndex',
    data: {
        preloadedNews: [],
        categories: []
    },
    components: {News},
    created: function () {
        
        // console.log(url);
        // if (url == '/') {
        //     console.log('url = /');
        // }

        AXIOS.get(url)
            .then(function(response) {
                newsIndex.preloadedNews = response.data;
                // console.log(app.preloadedNews);
            });
    }
});