import UserProfile from './components/UserProfile.vue';
import url from './API.js';
import {AXIOS} from './axios.global.js';
import 'setimmediate';

var userProfile = new Vue ({
    el: '#userProfile',
    data: {
        user: undefined,
    },
    components: {UserProfile},
    created: function () {
        self = this;
        // console.log(url);
        AXIOS.get(url)
            .then(function(response) {
                self.user = response.data;
                self.user.comments = userProfile.user.comments.reverse();
                console.log(self.user == undefined);
            });
    },
    mounted: function () {
    }
});