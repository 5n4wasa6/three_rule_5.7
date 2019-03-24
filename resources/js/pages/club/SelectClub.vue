<template>
    <div>
        <div class="sticky-header">
            <p>所属クラブ</p>
        </div>
        
        <div class="selectclub-container">
            <div class="btn-wrapper">
                <router-link :to="{ name: 'CreateClub'}" class="button is-small btn-create-club">
                    ＋新規作成
                </router-link>
            </div>
            
            <div>
                <p class="club-subject">クラブ</p>
                <div v-for="club in selectClubData[0].club_member" :key="club.id" class="club-name-wrapper">
                    <div v-if="club.join_status == 1" class="club-name">
                        <router-link :to="{ name: 'Club', params: { id: club.club.id, user_id: selectClubData[0].id } }">
                            <p>
                                {{ club.club.school_name }}{{ club.club.school_calling }}
                                {{ club.club.club_name }}{{ club.club.club_calling }}
                            </p>
                        </router-link>
                    </div>
                    
                    <div v-else class="club-name">
                        <span>
                            {{ club.club.school_name }}{{ club.club.school_calling }}
                            {{ club.club.club_name }}{{ club.club.club_calling }}
                        </span>
                        <button type="button" @click="approval(selectClubData[0].id, club.club.id)" class="button is-small btn-approval">承認</button>
                        <button type="button" @click="del(selectClubData[0].id, club.club.id)" class="button is-small btn-del">削除</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import axios  from 'axios'
import swal from 'sweetalert';

export default {
    data () {
        return {
            
        }
    },
    created() {
      this.selectClub()
    },
    computed: {
        ...mapGetters({
            selectClubData: 'club/selectClubData'
        })
    },
    methods: {
        // ...mapActions({
        //     selectClub: 'club/selectClub'
        // })
        selectClub() {
          this.$store.dispatch('club/selectClub')
        },
        approval(user_id, club_id) {
            const params = {
                user_id: user_id,
                club_id: club_id
            }
            axios.put('/approval', params)
                .then(response => {
                    this.$router.push('/club/'+ club_id)
                })
        },
        del(user_id, club_id) {
            console.log(club_id)
            const params = {
                user_id: user_id,
                club_id: club_id
            };
            axios.post('/approval', params)
                .then(response => {
                    this.selectClub()
                    // this.$router.push('/selectClub')
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

.btn-wrapper {
    margin-bottom: 16px;
    text-align: right;
}
.btn-create-club {
    background-color: rgba(5, 40, 247, 95);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    /*width: 30%;*/
}

.selectclub-container {
    padding:  64px 8px;
    width: 100%;
}
.club-subject {
    border-bottom: 2px solid rgba(0, 0, 0, 0.05);
    /*border-bottom: 2px solid rgba(242, 27, 7, 100);*/
    padding-bottom: 2px;
    padding-left: 5px;
}
.club-name-wrapper {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    padding: 16px 8px;
}
.btn-approval {
    background-color: rgba(5, 40, 247, 95);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    margin-left: 8px;
    width: 12%;
}
.btn-del {
    background-color: rgba(242, 27, 7, 100);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    width: 12%;
}
</style>