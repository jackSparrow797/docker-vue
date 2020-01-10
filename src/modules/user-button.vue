<template>
    <a href="#"  class="btn  mr-3" :class="getClassUser(value)" @click="$emit('getUser', value)">Пользователь {{ value }}</a>
</template>

<script>
    export default {
        props: {
            value: {
                type: Number,
                default: '',
            },
            currentUser: {
                type: Number,
            }
        },
        methods: {
            getClassUser: function (value) {
                let out = 'btn-dark';
                if (this.currentUser == value) {
                    out = 'btn-outline-dark';
                }
                return out;
            }
        }
    }
</script>