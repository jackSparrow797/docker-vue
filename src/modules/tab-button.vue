<template>
    <li class="col-auto" :class="getClassTab(name)" >
        <a href="#" class="py-3" @click="$emit('setCurrentTab', name)">
            {{ tabs[name] }}
        </a>
    </li>
</template>

<script>
    export default {
        name: "tab-button",
        data() {
            return {
                tabs: {
                    main: 'Главная',
                    personal: 'Личные данные',
                }
            }
        },
        props: {
            name: {
                type: String,
                default: '',
            },
            currentTab: {
                type: String
            }
        },
        methods: {
            getClassTab: function (name) {
                let out = '';
                if (this.currentTab == name) {
                    out = 'active';
                }
                return out;
            },
        }
    }
</script>

<style scoped>

</style>