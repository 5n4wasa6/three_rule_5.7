<template>
    <div>
        <div class="sticky-header">
            <p>新規クラブ作成</p>
        </div>
        
        <div class="create-club-container">
            <div class="field has-addons subject">
                <div class="control">
                    <input class="input" type="text" v-model="school_name" placeholder="所属名を入力" required autofocus>
                </div>
                <div class="control">
                    <div class="select">
                        <select v-model="school_calling">
                            <option>高校</option>
                            <option>中学</option>
                            <option>特別支援</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="field has-addons subject">
                <div class="control">
                    <input class="input" type="text" v-model="club_name" placeholder="競技名を入力" required autofocus>
                </div>
                <div class="control">
                    <div class="select">
                        <select v-model="club_calling">
                            <option>部</option>
                            <option>クラブ</option>
                            <option>サークル</option>
                            <option>同好会</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="button" @click="createClub" class="button is-small btn-create">クラブ作成</button>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import axios  from 'axios'
import swal from 'sweetalert';

export default {
    components: {
        // StickyFooter
    },
    data () {
        return {
            school_name: '',
            school_calling: '',
            club_name: '',
            club_calling: ''
        }
    },
    created() {
    //   this.start()
    },
    computed: {
        ...mapGetters({
            // selectClubData: 'club/selectClubData'
        })
    },
    methods: {
        ...mapActions({
            // start: 'club/selectClub'
        }),
        createClub() {
            const params = {
                school_name:    this.school_name,
                school_calling: this.school_calling,
                club_name:      this.club_name,
                club_calling:   this.club_calling
            };
            
            axios.post('/club/create', params)
                .then(response => {
                    swal("Success!", "Your Club has been created!", "success")
                    this.$router.push('/selectclub')
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

.create-club-container {
    padding:  80px 24px;
    text-align: center;
    width: 100%;
}
.subject {
    text-align: center;
    margin-bottom: 16px;
}
.btn-create {
    background-color: rgba(5, 40, 247, 95);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    /*width: 25%;*/
} 
</style>