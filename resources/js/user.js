import UserProfile from './components/UserProfile.vue';
import url from './API.js';

var userProfile = new Vue ({
    el: '#userProfile',
    data: {
        user: [],
    },
    components: {UserProfile},
    created: function () {
        // console.log(url);
        axios.get(url)
            .then(function(response) {
                userProfile.user = response.data;
                userProfile.user.comments = userProfile.user.comments.reverse();
                console.log(userProfile.user.news);
            });
    }
});