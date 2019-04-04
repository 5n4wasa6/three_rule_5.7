<template>
    <div class="register-login-container is-hidden-mobile">
        <div class="register-login">
            <p class="register-login-text">まずは無料登録！</p>
            <div class="register-login-banner">
                <div class="login">
                    <router-link to="/login" class="button btn-login">ログイン</router-link>
                </div>
                <div class="register">
                    <router-link to="/register" class="button btn-register">新規登録</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>

<style scoped>
.register-login-container {
    position: relative;
}
.register-login {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 1000;
}
.register-login-text {
    text-align: center;
    margin-bottom: 8px;
    letter-spacing: 8px;
    font-weight: bold;
}
.register-login-banner {
    display: flex;
    width: 400px;
}
.register,
.login
{
    width: 100%;
    margin: 0px 4px;
    text-align: center;
}
.btn-register {
    color: white;
    background-color: rgba(242, 27, 7, 100);
    border: none;
    font-weight: bold;
    width: 100%;
}
.btn-login {
    color: white;
    background-color: rgba(5, 40, 247, 95);
    border: none;
    font-weight: bold;
    width: 100%;
}
</style>