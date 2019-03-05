import Categories from './components/category/Header.vue';
import {AXIOS} from './axios.global';
import NavbarUserComponent from './components/NavbarUserComponent.vue';


var header = new Vue ({
    el: '#vue-header',
    data: function(){
        return {
            categories: [],
            currentUrl: '',
            currentuser: [],
        }
    },
    components: {Categories, NavbarUserComponent},
    created: function () {
        AXIOS.get('http://localhost/api/category/')
        .then(function(response) {
            header.categories = response.data;
        });


        if (localStorage.getItem('currentUser') != null) {
            this.currentuser = JSON.parse(localStorage.getItem('currentUser'));
            // this.currentuser = JSON.parse((this.currentuser));
            // console.log(this.currentuser);
        } else {
            this.currentuser = [];
        }
    },
});