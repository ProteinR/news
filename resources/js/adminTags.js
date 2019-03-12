import AdminTags from './components/Admin/AdminTags';
// import {AXIOS} from './axios.global';


var adminTags = new Vue ({
    el: '#adminTags',
    props: [
        'token'
    ],
    data: {
        postData: [],
        // url: $route.query
    },
    components: {AdminTags},
    created: function () {
    }
});