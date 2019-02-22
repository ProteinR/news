import PostShow from './components/News/PostShow.vue';
import url from './API.js';


var postShow = new Vue ({
    el: '#vue-post',
    data: {
        postData: [],
        // url: $route.query
    },
    components: {PostShow},
    created: function () {
        axios.get(url)
            .then(function(response) {
                postShow.postData = response.data;
                // console.log(postShow.postData);
            });
    }
});