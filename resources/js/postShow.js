import PostShow from './components/News/PostShow.vue';

var postShow = new Vue ({
    el: '#vue-post',
    data: {
        postData: []
    },
    components: {PostShow},
    created: function () {
        axios.get('http://localhost/api/news/1')
            .then(function(response) {
                postShow.postData = response.data;
                console.log(postShow.postData);
            });
    }
});