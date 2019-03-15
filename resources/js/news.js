import News from './components/News.vue';

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
    }
});