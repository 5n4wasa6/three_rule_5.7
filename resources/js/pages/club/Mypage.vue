<template>
    <div>
        <div class="sticky-header">
            <p>マイページ</p>
        </div>
        
        <div class="profile">
            <div class="btn-rule-wrapper">
                <span @click="toggleEdit" v-if="isEdit" class="button is-small btn-edit-update"><i class="fas fa-pencil-alt"></i></span>
                <span @click="onSubmit" v-else class="button is-small btn-edit-update"><i class="fas fa-check"></i></span>
            </div>
            
            <div class="image-container">
                <img
                    src="http://placehold.jp/100x100.png"
                    placeholder="http://placehold.jp/100x100.png"
                    :blur="30"
                    @click="imageModalToggle"
                />
            </div>
            <image-modal v-if="imageModalShow" @close="imageModalToggle" :submit="uploadImage"/>
            
            <div class="main-profile">
                <p>{{ mypage[0].name }}</p>
            </div>
            
            <div class="club-rules">
                <div class="club-rules-container">
                    <h3 class="club-rules-heading">
                        <span class="three-rule-one"><span class="three-rule-two">3ルール</span></span>
                    </h3>
                
                    <div class="club-3rule">
                        <div class="square-wrapper">
                            <div class="spacer"></div>
                            <div class="content">
                                <div class="rule-number">1</div>
                            </div>
                        </div>
                        <div class="rule-text" v-if="isEdit">
                            {{ mypage[0].mypage[0].rule_one }}
                        </div>
                        <div class="rule-text" v-else>
                            <div class="field has-addons">
                                <div class="control">
                                    <input class="input" type="text" v-model="mypage[0].mypage[0].rule_one" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="club-3rule">
                        <div class="square-wrapper">
                            <div class="spacer"></div>
                            <div class="content">
                                <div class="rule-number">2</div>
                            </div>
                        </div>
                        <div class="rule-text" v-if="isEdit">
                            {{ mypage[0].mypage[0].rule_two }}
                        </div>
                        <div class="rule-text" v-else>
                            <div class="field has-addons">
                                <div class="control">
                                    <input class="input" type="text" v-model="mypage[0].mypage[0].rule_two" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="club-3rule">
                        <div class="square-wrapper">
                            <div class="spacer"></div>
                            <div class="content">
                                <div class="rule-number">3</div>
                            </div>
                        </div>
                        <div class="rule-text" v-if="isEdit">
                            {{ mypage[0].mypage[0].rule_three }}
                        </div>
                        <div class="rule-text" v-else>
                            <div class="field has-addons">
                                <div class="control">
                                    <input class="input" type="text" v-model="mypage[0].mypage[0].rule_three" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="journal-container">
                <div class="heading">
                    日誌
                </div>
                <div class="btn-create-wrapper">
                    <router-link :to="{ name: 'MyJournalCreate', params: { id: $route.params.id } }">
                        <button type="button" class="button is-small btn-create">＋ 新規作成</button>
                    </router-link>
                </div>
                
                <div class="journals">
                    <div class="journal" v-for="journal in mypage[0].my_journal" :key="journal.id">
                        <router-link :to="{ name: 'OneMyJournal', params: { id: $route.params.id, myjournal_id: journal.id } }">
                            <p>
                                <span>{{ journal.activity_at }}</span>
                                <!--<span>{{ journal.title }}</span>-->
                            </p>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <sticky-footer></sticky-footer>
    </div>
</template>

<script>
import ImageModal from '../../components/mypage/ImageModal'
import StickyFooter from '../../components/club/StickyFooter';
import { mapActions, mapGetters } from 'vuex';
import axios  from 'axios'

export default {
    components: {
        ImageModal,
        StickyFooter
    },
    data () {
        return {
            imageModalShow: false,
            isEdit: true,
            icon: ''
        }
    },
    created() {
      this.getMypage()
    },
    computed: {
        ...mapGetters({
            mypage: 'mypage/mypage'
        }),
    },
    methods: {
        ...mapActions({
            getMypage: 'mypage/getMypage'
        }),
        getMypage(club_id, user_id) {
          this.$store.dispatch('mypage/getMypage', { club_id: this.$route.params.id, user_id: this.$route.params.user_id })
        },
        toggleEdit() {
          this.isEdit = !this.isEdit
        },
        onSubmit() {
            const params = {
                // name:         this.individualMypageData.name,
                // oneword:    this.mypage[0].mypage[0].oneword,
                rule_one:   this.mypage[0].mypage[0].rule_one,
                rule_two:   this.mypage[0].mypage[0].rule_two,
                rule_three: this.mypage[0].mypage[0].rule_three
            };
            
            axios.put('/club/'+ this.$route.params.id +'/mypage/'+ this.mypage[0].mypage[0].id, params)
                .then(response => {
                    swal("Updated!", "Your editing has been done!", "success")
                    this.isEdit = !this.isEdit
                })
        },
        imageModalToggle() {
          this.imageModalShow = !this.imageModalShow
        },
        uploadImage(icon) {
            
            const params = {
                icon : icon,
                user_id : this.mypage[0].id
            }
            
            axios.put('/club/'+ this.$route.params.id +'/mypage/'+ this.mypage[0].mypage[0].id +'/icon', params)
                .then(response => {
                    swal("Updated!", "Your editing has been done!", "success")
                    this.imageModalShow = !this.imageModalShow
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
.profile {
    margin: 56px 16px 64px;
}
.image-container {
    text-align: center;
}
.main-profile {
    text-align: center;
}
.name {
    margin-top: 5px;
}
.heading
{
    text-align: center;
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 8px;
}
.club-rules {
    margin: 0 0px 16px;
    overflow: auto;
}
.club-rules-container {
    margin: 8px 16px;
}
.btn-edit-update {
    background-color:  rgba(0, 0, 0, 0.05);
    border: none;
    border-radius: 3px;
    /*color: white;*/
    font-weight: bold;
    /*width: 25%;*/
} 
.btn-rule-wrapper {
    text-align: right;
}
.club-rules-heading {
    font-weight: bold;
    text-align: center;
}
.three-rule-one {
    border-bottom: 2px solid rgba(242, 27, 7, 100);
    padding-bottom: 1px;
}
.three-rule-two {
    border-bottom: 2px solid rgba(242, 27, 7, 100);
    padding-bottom: 5px;
}
.club-3rule {
    display: flex;
    width: 100%;
    margin: 16px 0px 16px;
}
.square-wrapper {
    position: relative;
    width: 10%;
    height: 10%;
    margin-right: 16px;
}
.spacer {
    width: 100%;
    padding-bottom: 100%;
}
.content {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(5, 40, 247, 95);
    border-radius: 5px;
}
.rule-number {
    position: absolute;
    text-align: center;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    margin:0;
    padding:0;
    color: white;
    font-size: 14px;
    /*font-weight: bold;*/
}
.rule-text {
    display: inline-block;
    vertical-align: middle;
    width: 85%;
}
.control {
    width: 100%;
}

.btn-create-wrapper {
    text-align: right;
    margin-bottom: 8px;
}

.btn-create {
    background-color:  rgba(5, 40, 247, 95);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    /*width: 25%;*/
} 
.journal-container {
    width: 100%;
    margin-bottom: 32px;
}
.journals {
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    width: 100%;
}
.journal {
    position: relative;
    width: 30%;
    height: 100px;
    padding: 8px;
    text-align: center;
    font-size: 12px;
    border: 2px solid rgba(242, 27, 7, 100);
    border-radius: 4px;
    margin: 8px 0;
}
.journal p {
    position: absolute;
    text-align: center;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    margin:0;
    padding:0;
    color: rgba(242, 27, 7, 100);
}



@media screen and (max-width: 767px) {
    .sticky-header {
        height: 50px;
        line-height: 10px;
    }
}
</style>