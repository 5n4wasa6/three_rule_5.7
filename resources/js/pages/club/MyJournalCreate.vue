<template>
    <div>
        <div class="sticky-header">
            <p>日誌を書く</p>
        </div>
        
        <div class="journal-container">
            <div class="content-point">
                <!--<div class="strengths">-->
                <div  class="control">
                    <span class="box-title">活動日</span>
                    <div>
                        <input class="input" type="date" v-model="activity_at" required>
                    </div>
                </div>
                <div class="control">
                    <span class="box-title">タイトル</span>
                    <div>
                        <input class="input" type="text" v-model="title" placeholder="32文字以内" required>
                    </div>
                </div>
                <div class="control">
                    <span class="box-title">自慢ポイント</span>
                    <div>
                        <input class="input" type="text" v-model="appeal" placeholder="32文字以内" required>
                    </div>
                </div>
                <div class="control">
                    <span class="box-title">改善ポイント</span>
                    <div>
                        <input class="input" type="text" v-model="improvement" placeholder="32文字以内" required>
                    </div>
                </div>
                <div class="control">
                    <span class="box-title">ネクストアクション</span>
                    <div>
                        <input class="input" type="text" v-model="nextaction" placeholder="32文字以内" required>
                    </div>
                </div>
                <div class="control">
                    <span class="box-title">フリー</span>
                    <div>
                        <input class="input" type="text" v-model="free" placeholder="32文字以内" required>
                    </div>
                </div>
            </div>
            
            <div class="btn-create-wrapper">
                <button type="button" @click="onSubmit" class="button is-small btn-create">作成</button>
            </div>
        </div>
        <sticky-footer></sticky-footer>
    </div>
</template>

<script>
import StickyFooter from '../../components/club/StickyFooter';
import { mapGetters } from 'vuex';
import swal from 'sweetalert';

export default {
    components: {
        StickyFooter
    },
    data () {
        return {
            activity_at: '',
            title:         '',
            appeal:        '',
            improvement:   '',
            nextaction:    '',
            free:          ''
        }
    },
    // computed: {
    //     ...mapGetters({
    //         selectClubData: 'club/selectClubData'
    //     })
    // },
    methods: {
        onSubmit() {
            const params = {
                activity_at:  this.activity_at,
                title:        this.title,
                appeal:       this.appeal,
                improvement:  this.improvement,
                nextaction:   this.nextaction,
                free:         this.free
            };
            
            axios.post('/club/'+ this.$route.params.id +'/mypage/'+ this.$route.params.user_id +'/myjournal', params)
                .then(response => {
                    swal("Created!", "Your product has been opsated!", "success")
                    this.$router.push('/club/'+ this.$route.params.id +'/mypage/'+ this.$route.params.user_id)
                })
        },
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
.journal-container {
    margin: 80px 16px 64px;
}

/*.strengths {*/
/*    position: relative;*/
/*    margin: 2em 0;*/
/*    padding: 0.5em 1em;*/
/*    border: solid 3px rgba(5, 40, 247, 95);*/
/*    border-radius: 8px;*/
/*}*/
/*.strengths .box-title {*/
/*    position: absolute;*/
/*    display: inline-block;*/
/*    top: -13px;*/
/*    left: 10px;*/
/*    padding: 0 8px;*/
/*    line-height: 1;*/
/*    font-size: 16px;*/
/*    background: #FFF;*/
/*    color: rgba(242, 27, 7, 100);*/
/*    font-weight: bold;*/
/*}*/
.control {
    margin-top: 8px;
}
.input {
    margin: 8px 0;
}
.btn-create-wrapper {
    margin-top: 16px;
    text-align: center;
}
.btn-create {
    background-color: rgba(5, 40, 247, 95);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    width: 25%;
    /*padding: 8px 8px 8px;*/
} 



@media screen and (max-width: 767px) {
    .sticky-header {
        height: 50px;
        line-height: 10px;
    }
}
</style>