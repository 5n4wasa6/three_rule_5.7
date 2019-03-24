<template>
    <div>
        <div class="sticky-header">
            <p>メンバーを招待</p>
        </div>
        
        <div class="invite-container">
            <div class="field has-addons search">
                <div class="control">
                    <input class="input" type="text" v-model="keyword" placeholder="メンバーを検索" required autofocus>
                </div>
            </div>
            
            <div class="all-user">
                <table>
                    <tr v-for="user in filteredUsers" :key="user.id" class="user-name">
                        <td v-text="user.name"></td> 
                        <button type="button"  @click="onSubmit(user.id)" class="button is-small btn-invite">invite</button>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import StickyFooter from '../../components/club/StickyFooter';
import { mapActions, mapGetters } from 'vuex';
import axios  from 'axios'
import swal from 'sweetalert';

export default {
    components: {
        StickyFooter
    },
    data () {
        return {
            keyword: ''
        }
    },
    created() {
      this.getUser()
    },
    computed: {
        ...mapGetters({
            userData: 'club/userData'
        }),
        filteredUsers: function() {
            let users = [];
            
            for(let i in this.userData) {
                
                let user = this.userData[i];
                if(user.name.indexOf(this.keyword) !== -1) {
                    users.push(user);
                }
            }
            return users;
        }
    },
    methods: {
        ...mapActions({
            getUser: 'club/getUser'
        }),
        
        onSubmit(id) {
            const params = {
                id: id,
            };
            axios.post('/club/'+ this.$route.params.id +'/invite', params)
                .then(response => {
                    // swal("Invited!", "Your product has been opsated!", "success")
                })
        }
    }
};
</script>

<style scoped>
.sticky-header {
    width: 100%;
    height: 50px;
    line-height: 16px;
    position: fixed;
    top: 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    background-color: #FCFCFC;
    /*background-color: rgba(5, 40, 247, 95);*/
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
.invite-container {
    padding:  64px 8px;
    width: 100%;
}
.search {
    margin: 16px 8px 16px;
}
.control {
    width: 100%;
}
.all-user {
    margin-left: 8px;
}
table {
    width: 90%;
}
td {
    padding: 8px 8px 8px;
}
.user-name {
    border-bottom: 2px solid rgba(0, 0, 0, 0.05);
    /*margin: 16px;*/
}
.btn-invite {
    background-color: rgba(5, 40, 247, 95);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    margin-top: 7px;
}

</style>