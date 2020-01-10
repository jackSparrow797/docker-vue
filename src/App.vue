<template>
    <div id="newApp">
        <UsersButton/>
    </div>
</template>

<script>
    import UsersButton from './modules/users-button.vue'
    export default {
        name: 'newApp',
        components: {
            UsersButton
        }
    }
</script>