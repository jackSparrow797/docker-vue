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
                    <template v-for="(value, name) in users">
                        <a href="#" class="btn  mr-3" :class="getClassUser(value)" @click="getUser(value)">Пользователь {{ value }}</a>
                    </template>
                    <div class="row">
                        <div v-if="show" class="col-12 mt-5">
                            <ul class="tabs row m-0 p-0">
                                <template v-for="(value, name, index) in user">
                                    <li class="col-auto" :class="getClassTab(name)">
                                        <a href="#" class="py-3" @click="setCurrentTab(name)">
                                            {{ tabs[name] }}
                                        </a>
                                    </li>
                                </template>

                            </ul>
                            <template v-for="(values, name, index) in user">
                                <div class="tab-content p-3"  v-if="currentTab == name ">
                                    <ul class="m-0 p-0">
                                        <li v-for="(value, name) in values">
                                            <span class="bold">{{title[name]}}: </span>
                                            {{ value }}
                                        </li>
                                    </ul>
                                </div>
                            </template>



                        </div>
                    </div>
                </div>
                <script>
                    var app = new Vue({
                        el: '#app',
                        data: {
                            currentTab: 'main',
                            currentUser: 0,
                            tabs: {
                                main: 'Главная',
                                personal: 'Личные данные',
                            },
                            title: {
                                name: 'Имя',
                                surname: 'Фамилия',
                                secondname: 'Отчество',
                                post: 'Должность',
                                phone: 'Телефон',
                                email: 'Email',
                                address: 'Адрес',
                                sex: 'Пол',
                                age: 'Возраст',
                            },
                            show: false,
                            users: [],
                            user: [],
                            url: {
                                user: '/ajax/user.php?user=',
                                users: '/ajax/user.php',
                            }
                        },
                        created: function() {
                            axios.get(this.url.users)
                                .then((response) => {
                                    // handle success
                                    this.users = response.data;
                                })
                                .catch(function (error) {
                                    // handle error
                                    console.log(error);
                                })
                                .finally(function () {
                                    // always executed
                                });
                        },
                        methods: {
                            getUser: function (id) {
                                if (this.currentUser != id) {
                                    this.currentUser = id;
                                    axios.get(this.url.user + id)
                                        .then((response) => {
                                            // handle success
                                            this.show = true;
                                            this.user = response.data.data;
                                        })
                                        .catch(function (error) {
                                            // handle error
                                            console.log(error);
                                        })
                                        .finally(function () {
                                            // always executed
                                        });
                                }

                            },
                            setCurrentTab: function (name) {
                                this.currentTab = name;
                            },
                            getClassTab: function (name) {
                                let out = '';
                                if (this.currentTab == name) {
                                    out = 'active';
                                }
                                return out;
                            },
                            getClassUser: function (value) {
                                let out = 'btn-dark';
                                if (this.currentUser == value) {
                                    out = 'btn-outline-dark';
                                }
                                return out;
                            }
                        }
                    })
                </script>
            </div>
        </div>
    </div>
</body>
</html>