<template>
    <div>
        <div class="sticky-header">
            <p>新規登録</p>
        </div>
        <section class="section">
            <div class="form-container">
                <form>
                    <div class="field">
                        <label class="label">名前</label>
                        <input class="input" type="text" placeholder="フルネーム" v-model="user.name" required autofocus>
                    </div>
                    <div class="control">
                        <label class="label">属性</label>
                        <div class="select">
                            <select v-model="user.type">
                              <option disabled value="">属性選択</option>
                              <option>選手</option>
                              <option>コーチ</option>
                              <option>トレーナー</option>
                              <option>栄養士</option>
                              <option>支援者</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">メールアドレス</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="email" placeholder="半角英数" v-model="user.email" required autofocus>
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">パスワード</label>
                        <div class="control has-icons-left">
                            <input class="input" type="password" placeholder="6~16文字 半角英数" v-model="user.password" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button class="button" @click.prevent="handleRegister">
                            登録する
                        </button>
                    </div>
                </form>
            </div>        
        </section>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    data() {
        return {
            user: {
                name: '',
                type: '',
                email: '',
                password: ''
            }
        }
    },
    methods: {
        ...mapActions({
            register: 'user/register',
            login: 'user/login'
        }),
        async handleLogin() {
            await this.login({ email: this.user.email, password: this.user.password })
            this.$router.push('/selectclub')
        },
        async handleRegister() {
            const params = {
                name:      this.user.name,
                user_type: this.user.type,
                email:     this.user.email,
                password:  this.user.password
            };
            axios.post('/register', params)
                .then(response => {
                   this.handleLogin() 
                })
        }
    }
}
</script>

<style type="scss" scoped>

.sticky-header {
    width: 100%;
    height: 50px;
    line-height: 16px;
    position: fixed;
    top: 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    background-color: #FCFCFC;
    z-index: 999;
}
.sticky-header p {
    position: absolute;
    text-align: center;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    margin:0;
    padding:0;
    font-weight: bold;
    font-size: 16px;
}
.section {
    margin-top: 32px;
}
.btn-line {
  background-color: #00c300;
  border: 1px solid #00c300;
  color: white;
}
.register-title {
  padding-top: 10px;
  padding-bottom: 15px;
  font-weight: bold;
  font-size: 18px;
}
.label {
    font-size: 12px;
    font-weight: normal;
}
.control {
    margin-bottom: 12px;
}
.btn-container {
    margin-top: 24px;
    text-align: center;
}
.btn-container .button {
    background-color:  rgba(242, 27, 7, 100);
    border: 1px solid  rgba(242, 27, 7, 100);
    color: white;
    width: 32%;
}
.reset-password {
    margin-top: 15px;
    text-align: center;
}


@media screen and (min-width: 1024px) {
    .form-container {
        padding: 0 400px;
    }
}
</style>