<template>
    <div>
        <div class="sticky-header">
            <p>メニュー</p>
        </div>
        
        
        <div class="menu-container">
            <div class="btn-both">
                <div class="btn-wrapper">
                    <router-link :to="{ name: 'MenuCreate', params: { id: $route.params.id, user_id: $route.params.user_id } }" class="button is-small btn-create-menu">
                        ＋新規作成
                    </router-link>
                </div>
                
                <div class="btn-menu-wrapper">
                    <span @click="toggleEdit" v-if="isEdit" class="button is-small btn-edit-update"><i class="fas fa-pencil-alt"></i>タグ編集</span>
                    <span @click="onSubmit" v-else class="button is-small btn-edit-update"><i class="fas fa-check"></i>完了</span>
                </div>
            </div>
            
            <p v-if="isEdit" class="tag">#{{ clubData[0].tag_one }}</p>
            <div class="control" v-else>
                    <input class="input" type="text" v-model="clubData[0].tag_one" required>
                </div>
            <div v-for="menu in myClubMenu" :key="menu.id">
                <div v-if="menu.tag == 1">
                    <div class="column">
                        <div class="menu-title">
                            <router-link :to="{ name: 'OneMenu', params: { menu_id: menu.id } }">
                                {{ menu.title }}
                            </router-link>
                        </div>
                        <!--<div class="menu-url">-->
                        <!--    {{ menu.url }}-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            
            <p v-if="isEdit" class="tag">#{{ clubData[0].tag_two }}</p>
            <div class="control" v-else>
                <input class="input" type="text" v-model="clubData[0].tag_two" required>
            </div>
            <div v-for="menu in myClubMenu">   
                <div v-if="menu.tag == 2">
                    <div class="column">
                        <div class="menu-title">
                            <router-link :to="{ name: 'OneMenu', params: { menu_id: menu.id } }">
                                {{ menu.title }}
                            </router-link>
                        </div>
                        <!--<div class="menu-url">-->
                        <!--    {{ menu.url }}-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            
            <p v-if="isEdit" class="tag">#{{ clubData[0].tag_three }}</p>
            <div class="control" v-else>
                <input class="input" type="text" v-model="clubData[0].tag_three" required>
            </div>
            <div v-for="menu in myClubMenu">
                <div v-if="menu.tag == 3">
                    <div class="column">
                        <div class="menu-title">
                            <router-link :to="{ name: 'OneMenu', params: { menu_id: menu.id } }">
                                {{ menu.title }}
                            </router-link>
                        </div>
                        <!--<div class="menu-url">-->
                        <!--    {{ menu.url }}-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            
            <p v-if="isEdit" class="tag">#{{ clubData[0].tag_four }}</p>
            <div class="control" v-else>
                <input class="input" type="text" v-model="clubData[0].tag_four" required>
            </div>
            <div v-for="menu in myClubMenu">
                <div v-if="menu.tag == 4">
                    <div class="column">
                        <div class="menu-title">
                            <router-link :to="{ name: 'OneMenu', params: { menu_id: menu.id } }">
                                {{ menu.title }}
                            </router-link>
                        </div>
                        <!--<div class="menu-url">-->
                        <!--    {{ menu.url }}-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            
            <p v-if="isEdit" class="tag">#{{ clubData[0].tag_five }}</p>
            <div class="control" v-else>
                <input class="input" type="text" v-model="clubData[0].tag_five" required>
            </div>
            <div v-for="menu in myClubMenu">
                <div v-if="menu.tag == 5">
                    <div class="column">
                        <div class="menu-title">
                            <router-link :to="{ name: 'OneMenu', params: { menu_id: menu.id } }">
                                {{ menu.title }}
                            </router-link>
                        </div>
                        <!--<div class="menu-url">-->
                        <!--    {{ menu.url }}-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
        <sticky-footer></sticky-footer>
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
            isEdit: true
        }
    },
    created() {
      this.getMenu()
    },
    computed: {
        ...mapGetters({
            clubData: 'club/clubData',
            myClubMenu: 'menu/myClubMenu'
        }),
    },
    methods: {
        toggleEdit() {
          this.isEdit = !this.isEdit
        },
        onSubmit() {
            const params = {
                tag_one:   this.clubData[0].tag_one,
                tag_two:   this.clubData[0].tag_two,
                tag_three: this.clubData[0].tag_three,
                tag_four:  this.clubData[0].tag_four,
                tag_five:  this.clubData[0].tag_five,
            };
            
            axios.put('club/2/menu', params)
                .then(response => {
                    swal("Updated!", "Your editing has been done!", "success")
                    this.isEdit = !this.isEdit
                })
        },   
        // ...mapActions({
        //     getMenu: 'menu/getMenu'
        // })
        getMenu(club_id) {
          this.$store.dispatch('menu/getMenu', this.$route.params.id)
        }
    }
};
</script>

<style scoped>
/* .sticky-header {
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
} */
.menu-container {
    padding:  64px 8px;
    width: 100%;
}
.btn-both {
    display: flex;
    justify-content: flex-end;
}
.btn-wrapper {
    margin:0 8px 16px 0;
    /*text-align: right;*/
}
.btn-create-menu {
    background-color: rgba(5, 40, 247, 95);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    /*width: 30%;*/
}
.btn-menu-wrapper {
    text-align: right;
}
.btn-edit-update {
    background-color: rgba(242, 27, 7, 100);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    /*width: 25%;*/
} 
.item {
    margin-top: 16px;
}
.tag {
    margin: 16px 0 5px;
}
.column {
    border: 1px solid rgba(0, 0, 0, 0.05);
    display: flex;
    padding: 0;
}
.menu-title {
    /*border-right: 1px solid rgba(0, 0, 0, 0.05);*/
    overflow: hidden;
    padding: 3px 5px;
    text-overflow: ellipsis;
    /*width: 50%;*/
}
/*.menu-url {*/
/*    overflow: hidden;*/
/*    padding: 3px 5px;*/
/*    text-overflow: ellipsis;*/
/*    width: 50%;*/
/*}*/
.input {
    margin: 16px 0;
}


@media screen and (max-width: 767px) {
    .sticky-header {
        height: 50px;
        line-height: 10px;
    }
}
</style>