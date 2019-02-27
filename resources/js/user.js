import UserProfile from './components/UserProfile.vue';
import url from './API.js';
import {AXIOS} from './axios.global';

var userProfile = new Vue ({
    el: '#userProfile',
    data: {
        user: [],
    },
    components: {UserProfile},
    created: function () {
        // console.log(url);
        AXIOS.get(url)
            .then(function(response) {
                userProfile.user = response.data;
                userProfile.user.comments = userProfile.user.comments.reverse();
                console.log(userProfile.user.news);
            });
    }
});