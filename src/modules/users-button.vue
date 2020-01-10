<template v-if="users.length" >
    <div>
        <UserButton
                v-for="(user, index) in users"
                :key="index"
                :value="user"
                :currentUser="currentUser"
                @getUser="getUser"
        />
        <div class="row">
            <div v-if="show" class="col-12 mt-5">
                <ul class="tabs row m-0 p-0">
                    <TabButton
                            v-for="(value, name, index) in user"
                            :key="index"
                            :name="name"
                            :currentTab="currentTab"
                            @setCurrentTab="setCurrentTab"
                    />

                </ul>
                <Tabs
                        v-for="(values, name, index) in user"
                        :key="index"
                        :values="values"
                        :name="name"
                        :currentTab="currentTab"
                />




            </div>
        </div>
    </div>



</template>


<script>

    import UserButton from './user-button.vue'
    import TabButton from "./tab-button.vue";
    import Tabs from "./Tabs.vue";
    const axios = require('axios').default;
    export default {
        components: {
            Tabs,
            TabButton,
            UserButton
        },
        data() {
            return {
                url: {
                    user: '/ajax/user.php?user=',
                    users: '/ajax/user.php',
                },
                currentUser: 0,
                users: [],
                user: [],
                show: false,
                currentTab: 'main',

            }
        },
        created: function() {
            axios.get(this.url.users)
                .then((response) => {
                    // handle success
                    this.users = response.data;
                });
        },
        methods: {
            getUser(id) {
                if (this.currentUser != id) {
                    this.currentUser = id;
                    axios.get(this.url.user + id)
                        .then((response) => {
                            // handle success
                            this.show = true;
                            this.user = response.data.data;
                        });
                }
            },
            setCurrentTab: function (name) {
                this.currentTab = name;
            },

        },
    }

</script>
