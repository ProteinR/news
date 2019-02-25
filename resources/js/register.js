// import News from './components/News.vue';

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
            axios.post('/api/auth/account', {
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
            event.preventDefault();
            console.log(this.email);
            console.log(this.password);
            if (this.email == '' || this.password == '') {
                return false;
            }

            axios.post('/api/auth/token', {
                "email": this.email,
                "password": this.password
            })
                .then(function(response) {
                    register.registerResponse = response.data;
                    if (response.data.message == 'Authorization Successful!') {
                        swal({
                            title: "Успех!",
                            text: "Вы вошли! Вы будете перенаправлены на главную страницу через" +
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