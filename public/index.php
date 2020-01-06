<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test</title>
    <link rel="stylesheet" href="dist/main.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="dist/bundle.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h1>Vue test</h1>
                <div id="app">
                    <a href="#" v-on:click="getUser(1)">Пользователь 1 </a>
                    <div class="row">
                        <div v-if="show" class="col-12 mt-5">
                            <ul class="tabs row m-0 p-0">
                                <template v-for="(value, name, index) in users">
                                    <li class="col-auto" :class="(index == 0) ? 'active' : ''">
                                        <a href="#">
                                            {{ tabs[name] }} {{ index }}
                                        </a>
                                    </li>
                                </template>

                            </ul>


                            <ul>
                                <li v-for="(value, name) in users.main">{{title[name]}}: {{ value }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    var app = new Vue({
                        el: '#app',
                        data: {
                            tabs: {
                                main: 'Главная',
                                personal: 'Личные данные',
                            },
                            title: {
                                name: 'Имя',
                                surname: 'Фамилия',
                                secondname: 'Отчество',
                                post: 'Должность',
                            },
                            show: false,
                            users: [],
                            url: {
                                user: '/ajax/user.php?user=',
                                users: '/ajax/users.php',
                            }
                        },
                        methods: {
                            getUser: function (id) {
                                axios.get(this.url.user + id)
                                    .then((response) => {
                                        // handle success
                                        this.show = true;
                                        this.users = response.data.data;
                                        // console.log(response.data);
                                        console.log(this.users);
                                    })
                                    .catch(function (error) {
                                        // handle error
                                        console.log(error);
                                    })
                                    .finally(function () {
                                        // always executed
                                    });
                            }
                        }
                    })
                </script>
            </div>
        </div>
    </div>
</body>
</html>