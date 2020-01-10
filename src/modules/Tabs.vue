<template>
    <div class="tab-content p-3"  v-if="currentTab == name ">
        <ul class="m-0 p-0">
            <li v-for="(value, name) in values">
                <span class="bold">{{title[name]}}: </span>
                {{ value }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Tabs",
        data() {
            return {
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
                }
            }
        },
        props: {
            values: {
                type: Object
            },
            currentTab: {
                type: String
            },
            name: {
                type: String
            },
        }
    }
</script>

<style scoped>

</style>