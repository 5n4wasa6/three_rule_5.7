<template>
    <div>
        <figure class="image">
            <img
                src="http://placehold.jp/1280x320.png"
                placeholder="http://placehold.jp/1280x320.png"
                :blur="30"
                @click="imageModalToggle"
            />
            <image-modal v-if="imageModalShow" @close="imageModalToggle" :submit="uploadImage"/>
        </figure>
        
        <div class="club-heading">
            <h1 class="club-name">
                {{ clubData[0].school_name }}{{ clubData[0].school_calling }}
                {{ clubData[0].club_name }}{{ clubData[0].club_calling }}
            </h1>
            <router-link :to="{ name: 'ClubMember', params: { id: $route.params.id } }">
                <h2 class="club-member">
                    部員数
                    <span>{{ clubData[0].club_member.length }}</span>
                    人
                </h2>
            </router-link>
            <router-link :to="{ name: 'Invite', params: { id: $route.params.id } }">
                <button type="button" class="button is-small btn-invite">招待する</button>
            </router-link>    
        </div>
        
        <div class="slide-bar">
            <div class="item_rule">
                <router-link :to="{ name: 'Club', params: { id: $route.params.id, user_id: $route.params.user_id } }">
                    ルール
                </router-link>
            </div>
            <div class="item_discussion">
                <router-link :to="{ name: 'Discussion', params: { id: $route.params.id, user_id: $route.params.user_id } }">
                    ディスカッション
                </router-link>
            </div>
            <div class="item_calendar">
                <router-link :to="{ name: 'Calendar', params: { id: $route.params.id, user_id: $route.params.user_id } }">
                    カレンダー
                </router-link>
            </div>
            <div class="item_menu">
                <router-link :to="{ name: 'Menu', params: { id: $route.params.id, user_id: $route.params.user_id } }">
                    メニュー
                </router-link>
            </div>
        </div>
        
        <div class="club-rules">
            <div class="club-rules-container">
                <div class="btn-rule-wrapper">
                    <button type="button" @click="toggleEdit" v-if="isEdit" class="button is-small btn-edit-save"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" @click="onSubmit" v-else class="button is-small btn-edit-save"><i class="fas fa-check"></i></button>
                </div>
                
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
                        {{ clubData[0].rule_one }}
                    </div>
                    <div class="rule-text" v-else>
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input" type="text"  v-model="clubData[0].rule_one" required autofocus>
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
                        {{ clubData[0].rule_two }}
                    </div>
                    <div class="rule-text" v-else>
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input" type="text"  v-model="clubData[0].rule_two" required autofocus>
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
                        {{ clubData[0].rule_three }}
                    </div>
                    <div class="rule-text" v-else>
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input" type="text"  v-model="clubData[0].rule_three" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <sticky-footer></sticky-footer>
    </div>
</template>

<script>
import ImageModal from '../../components/club/ImageModal'
import StickyFooter from '../../components/club/StickyFooter';
import { mapActions, mapGetters } from 'vuex';
import axios  from 'axios'
import swal from 'sweetalert';

export default {
    components: {
        ImageModal,
        StickyFooter
    },
    data () {
        return {
            icon: '',
            imageModalShow: false,
            isEdit: true
        }
    },
    created() {
      this.getClub()
    },
    computed: {
        ...mapGetters({
            clubData: 'club/clubData'
        })
    },
    methods: {
        // ...mapActions({
        //     getClub: 'club/getClub'
        // }),
        getClub(club_id, user_id) {
          this.$store.dispatch('club/getClub', { club_id: this.$route.params.id, user_id: this.$route.params.user_id })
        },
        toggleEdit() {
          this.isEdit = !this.isEdit
        },
        imageModalToggle() {
          this.imageModalShow = !this.imageModalShow
        },
        uploadImage(icon) {
            const params = {
                icon : icon,
            }
            
            axios.put('/club/'+ this.$route.params.id +'/user/'+ this.$route.params.user_id +'/icon', params)
                .then(response => {
                    swal("Updated!", "Your editing has been done!", "success")
                    this.imageModalShow = !this.imageModalShow
                })
        },
        onSubmit() {
            const params = {
                rule_one: this.clubData[0].rule_one,
                rule_two: this.clubData[0].rule_two,
                rule_three: this.clubData[0].rule_three
            };
            
            axios.put('/club/'+ this.$route.params.id +'/rules', params)
                .then(response => {
                    swal("Updated!", "Your editing has been done!", "success")
                    this.isEdit = !this.isEdit
                })
        }
    }
};
</script>

<style scoped>

.club-heading {
    padding: 8px 8px 16px;
    text-align: center;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.club-name {
    font-weight: bold;
    font-size: 24px;
}
.club-member {
    display: inline-block;
    padding: 2px;
    font-size: 16px;
}
.btn-invite {
    background-color: rgba(5, 40, 247, 95);
    border: none;
    border-radius: 16px;
    color: white;
    font-weight: bold;
    margin-left: 8px;
    width: 20%;
}



.slide-bar {
    border-bottom: 2px solid rgba(0, 0, 0, 0.05);
    display: flex;
    text-align: center;
}

.item_rule {
    border-right: 2px solid rgba(0, 0, 0, 0.05);
    padding: 8px 0;
    width: 15%;
}
.item_discussion {
    border-right: 2px solid rgba(0, 0, 0, 0.05);
    padding: 8px 0;
    width: 40%;
}
.item_calendar {
    border-right: 2px solid rgba(0, 0, 0, 0.05);
    padding: 8px 0;
    width: 26%;
}
.item_menu {
    /*border: 2px solid rgba(0, 0, 0, 0.05);*/
    padding: 8px 0;
    width: 20%;
}


.club-rules {
    margin-bottom: 64px;
    overflow: auto;
}
.club-rules-container {
    margin: 8px 16px;
}
.btn-rule-wrapper {
    text-align: right;
}
.btn-edit-save {
    background-color: rgba(0, 0, 0, 0.05);
    border: none;
    border-radius: 5px;
    /*color: white;*/
    /*width: 15%;*/
}
.club-rules-heading {
    font-weight: bold;
    padding-bottom: 8px;
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



/*.sticky-side-bar {*/
/*    display: flex;*/
/*    width: 10%;*/
/*    height: 300px;*/
/*    line-height: 16px;*/
/*    position: fixed;*/
/*    right: 0;*/
/*    bottom: 50px;*/
/*}*/
/*.sticky-side-bar ul {*/
/*    display: flex;*/
/*    flex-direction: column;*/
/*    justify-content: space-around;*/
/*    align-items: center;*/
/*}*/
/*.sticky-side-bar li {*/
/*    font-size: 20px;*/
/*    color: #5BCDFF;*/
/*}*/
/*.sticky-side-bar ul li i {*/
/*    color: #5BCDFF;*/
/*}*/
</style>