// import News from './components/News.vue';
import {AXIOS} from './axios.global';


var register = new Vue ({
    el: '#register',
    data: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        registerResponse: ''
    },
    methods: {
        register() {
            event.preventDefault();

            if (this.name == '' || this.password=='' || this.email=='' || this.password_confirmation=='') {
                swal({
                    title: "Упс!",
                    text: "Пожалуйста, заполните все поля!",
                    icon: "error",
                    button: "Ок",
                    timer: 4000,
                });
                return false;
            }

            console.log(this.name);
            AXIOS.post('/api/auth/account', {
                "name": this.name,
                "email": this.email,
                "password": this.password,
                "password_confirmation": this.password_confirmation
            })
                .then(function(response) {
                    register.registerResponse = response.data;
                    if (response.data.message == 'success') {
                        swal({
                            title: "Успех!",
                            text: "Вы успешно зарегистрировались! Вы будете перенаправлены на страницу входа через" +
                                " несколько секунд...",
                            icon: "success",
                            button: "Aww yiss!",
                            timer: 3000,
                        });
                        setTimeout('location="/login";', 3000);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                    swal({
                        title: "Упс!",
                        text: "Произошла ошибка, попробуйте позже...",
                        icon: "error",
                        button: "Aww yiss!",
                        timer: 3000,
                    });
                })
        },
        login() {
            self= this;

            event.preventDefault();
            // console.log(this.email);
            // console.log(this.password);
            if (this.email == '' || this.password == '') {
                return false;
            }

            AXIOS.post('/api/auth/token', {
                "email": this.email,
                "password": this.password
            })
                .then(function(response) {
                    register.registerResponse = response.data;
                    if (response.data.message == 'Authorization Successful!') {
                        // response.data.currentUser.push('password', this.password);
                        let currentUser = response.data.currentUser;
                        currentUser.password = self.password;
                        
                        console.log(self.password);
                        localStorage.setItem('token', 'Bearer '+response.data.currentUser.api_token);
                        localStorage.setItem('currentUser', JSON.stringify(currentUser));
                        console.log(response.data.currentUser);
                        swal({
                            title: "Успех!",
                            text: "Вы вошли как "+ response.data.currentUser.name +"! Вы будете перенаправлены на" +
                                " главную страницу через" +
                                " несколько секунд...",
                            icon: "success",
                            button: "Aww yiss!",
                            timer: 3000,
                        });

                        setTimeout('location="/";', 3000);
                    }
                }).catch(function (error) {
                    swal({
                        title: "Ошибка!",
                        text: "Вы ввели неверный логин или пароль! Попробуйте еще раз.",
                        icon: "error",
                        button: "Ок!",
                        timer: 5000,
                    });
                    register.password = '';
            });
        }

    },
    components: {},
    created: function () {
        // console.log('on');
    }
});