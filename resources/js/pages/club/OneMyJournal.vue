<template>
    <div>
        <div class="sticky-header">
            <p>日誌</p>
        </div>
        
        <div class="journal-container">
            <div class="content-point" v-for="journal in mypage[0].my_journal" :key="journal.id">
                <!--<div class="btn-rule-wrapper">-->
                <!--    <span @click="toggleEdit" v-if="isEdit" class="button is-small btn-edit-update"><i class="fas fa-pencil-alt"></i></span>-->
                <!--    <span @click="onSubmit" v-else class="button is-small btn-edit-update"><i class="fas fa-check"></i></span>-->
                <!--</div>-->
                
                <div class="strengths">
                    <span class="box-title">活動日</span>
                    <p v-if="isEdit">
                        <span>{{ journal.activity_at }}</span>
                    </p>
                </div>
                
                <div class="strengths">
                    <span class="box-title">タイトル</span>
                    <p v-if="isEdit">
                        <span>{{ journal.title }}</span>
                    </p>
                </div>
                <div class="strengths">
                    <span class="box-title">自慢ポイント</span>
                    <p v-if="isEdit">
                        <span>{{ journal.appeal }}</span>
                    </p>
                </div>
                <div class="strengths">
                    <span class="box-title">改善ポイント</span>
                    <p v-if="isEdit">
                        <span>{{ journal.improvement }}</span>
                    </p>
                </div>
                <div class="strengths">
                    <span class="box-title">ネクストアクション</span>
                    <p v-if="isEdit">
                        <span>{{ journal.nextaction }}</span>
                    </p>
                </div>
                <div class="strengths">
                    <span class="box-title">フリー</span>
                    <p v-if="isEdit">
                        <span>{{ journal.free }}</span>
                    </p>
                </div>
            </div>
        </div>
        <sticky-footer></sticky-footer>
    </div>
</template>

<script>
import StickyFooter   from '../../components/club/StickyFooter';
import { mapGetters } from 'vuex';
import swal from 'sweetalert';

export default {
    components: {
        StickyFooter
    },
    data () {
        return {
            isEdit: true,
            // activity_at: '',
            // title:         '',
            // appeal:        '',
            // improvement:   '',
            // nextaction:    '',
            // free:          ''
        }
    },
    computed: {
        ...mapGetters({
            mypage: 'mypage/mypage'
        }),
    },
    // methods: {
    //     onSubmit() {
    //         const params = {
    //             activity_at:  this.activity_at,
    //             title:        this.title,
    //             appeal:       this.appeal,
    //             improvement:  this.improvement,
    //             nextaction:   this.nextaction,
    //             free:         this.free
    //         };
            
    //         axios.post('/club/'+ this.$route.params.id +'/mypage/'+ this.$route.params.user_id +'/myjournal', params)
    //             .then(response => {
    //                 swal("Created!", "Your product has been opsated!", "success")
    //                 this.$router.push('/club/'+ this.$route.params.id +'/mypage/'+ this.$route.params.user_id)
    //             })
    //     },
    // }
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

.strengths {
    position: relative;
    margin: 2em 0;
    padding: 0.5em 1em;
    border: solid 3px rgba(5, 40, 247, 95);
    border-radius: 8px;
}
.strengths .box-title {
    position: absolute;
    display: inline-block;
    top: -13px;
    left: 10px;
    padding: 0 8px;
    line-height: 1;
    font-size: 16px;
    background: #FFF;
    color: rgba(242, 27, 7, 100);
    font-weight: bold;
}
.btn-rule-wrapper {
    text-align: right;
}
.btn-edit-update {
    background-color: rgba(0, 0, 0, 0.05);
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