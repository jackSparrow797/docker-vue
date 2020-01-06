<script>
    var app = new Vue({
        el: '#app',
        data: {
            message: 'test'
        },
// определяйте методы в объекте `methods`
        methods: {
            getUser: function (event) {
// `this` внутри методов указывает на экземпляр Vue
                alert('Привет, !')
            }
        }
    })
</script>
