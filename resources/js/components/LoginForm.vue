<template>
    <div>
        <form-group label="Email Address">
            <input type="email" class="form-control" v-model="email">
        </form-group>
        <form-group label="password">
            <input type="password" class="form-control" v-model="password">
        </form-group>
        <button class="btn btn-primary" @click="login">Login</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: null,
                password: null,
            };
        },
        methods: {
            login() {
                console.log(this.email, this.password);
                const login_url = "/api/v1/login/";
                const bodyData = new FormData();
                bodyData.set("email", this.email);
                bodyData.set("password", this.password);
                const payLoad = {
                    email: this.email,
                    password: this.password
                };
                axios({
                    method: "POST",
                    url: login_url,
                    data: payLoad
                }).then(response => {
                    // console.log(response);
                    var user = response.data;
                    Vue.$cookies.set('user',user);
                    console.log(Vue.$cookies.get('user').api_token)
                });
            }
        }
    }
</script>

<style scoped>

</style>
