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
                    console.log(register.registerResponse);
                });
        },
        login() {
            event.preventDefault();
            console.log(this.email);
            console.log(this.password);

            axios.post('/api/auth/token', {
                "email": this.email,
                "password": this.password
            })
                .then(function(response) {
                    register.registerResponse = response.data;
                    if (response.data.message == 'Authorization Successful!') {
                        swal({
                            title: "Успех!",
                            text: "Вы вошли! Вы будете перенаправлены на страницу входа через" +
                                " несколько секунд...",
                            icon: "success",
                            button: "Aww yiss!",
                            timer: 3000,
                        });

                        setTimeout('location="/";', 3000);
                    }
                    // console.log(register.registerResponse);
                });
        }

    },
    components: {},
    created: function () {
        // console.log('on');
    }
});