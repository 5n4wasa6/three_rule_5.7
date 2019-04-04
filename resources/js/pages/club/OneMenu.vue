<template>
    <div>
        <div class="sticky-header">
            <p>メニュー詳細</p>
        </div>
        
        <div class="menu-container">
            <div class="btn-menu-wrapper">
                <span @click="toggleEdit" v-if="isEdit" class="button is-small btn-edit-update"><i class="fas fa-pencil-alt"></i>編集</span>
                <span @click="onSubmit" v-else class="button is-small btn-edit-update"><i class="fas fa-check"></i>完了</span>
            </div>
                
                
            <div v-if="isEdit">
                <div class="strengths">
                    <p class="box-title">タグ名</p>
                    <p v-if="oneMenuData.tag  == 1">{{ clubData[0].tag_one }}</p>
                    <p v-if="oneMenuData.tag  == 2">{{ clubData[0].tag_two }}</p>
                    <p v-if="oneMenuData.tag  == 3">{{ clubData[0].tag_three }}</p>
                    <p v-if="oneMenuData.tag  == 4">{{ clubData[0].tag_foue }}</p>
                    <p v-if="oneMenuData.tag  == 5">{{ clubData[0].tag_five }}</p>
                </div>
                <div class="strengths">
                    <p class="box-title">タイトル</p>
                    <p>{{ oneMenuData.title }}</p>
                </div>
                <div class="strengths">
                    <p class="box-title">URL</p>
                    <p>{{ oneMenuData.url }}</p>
                    <!--<a id="btn-a" href="" target="_blank" @click="goUrl">{{ oneMenuData.url }}</a>-->
                </div>
                <div class="strengths">
                    <p class="box-title">説明</p>
                    <p>{{ oneMenuData.description }}</p>
                </div>
            </div>
            
            
            <div v-else>
                <div>
                    <span class="box-title">タグ</span>
                </div>
                <div>
                    <div class="select">
                        <select v-model="tag">
                            <option value="1">{{ clubData[0].tag_one }}</option>
                            <option value="2">{{ clubData[0].tag_two }}</option>
                            <option value="3">{{ clubData[0].tag_three }}</option>
                            <option value="4">{{ clubData[0].tag_four }}</option>
                            <option value="5">{{ clubData[0].tag_five }}</option>
                        </select>
                    </div>
                </div>
                <div class="control">
                    <span class="box-title">タイトル</span>
                    <input class="input" type="text"  v-model="oneMenuData.title">
                </div>
                <div class="control">
                    <span class="box-title">URL</span>
                    <input class="input" type="text" v-model="oneMenuData.url">
                </div>
                <div class="control">
                    <span class="box-title">説明</span>
                    <textarea class="textarea" v-model="oneMenuData.description"></textarea>
                </div>
            </div>
        </div>

        <sticky-footer></sticky-footer>
    </div>
</template>

<script>
import StickyFooter from '../../components/club/StickyFooter';
import { mapGetters } from 'vuex';
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
    computed: {
        ...mapGetters({
            clubData: 'club/clubData',
            oneMenuData: 'menu/oneMenuData',
        })
    },
    methods: {
        toggleEdit() {
          this.isEdit = !this.isEdit
        },
        onSubmit() {
            const params = {
                tag: this.tag,
                title: this.oneMenuData.title,
                url: this.oneMenuData.url,
                description: this.oneMenuData.description
            };
            
            axios.put('club/1/menu/'+ this.$route.params.id, params)
                .then(response => {
                    swal("Updated!", "Your product has been opsated!", "success")
                    this.isEdit = !this.isEdit
                })
        },
        // goUrl() {
        //     var target = document.getElementById("btn-a");
        //     target.href = "oneMenuData.url";
        // }
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
.menu-container {
    padding:  64px 8px;
    width: 100%;
}
.btn-menu-wrapper {
    text-align: right;
}
.btn-edit-update {
    background-color: rgba(5, 40, 247, 95);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    /*width: 25%;*/
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
.control {
    margin-top: 8px;
}
.input {
    margin-top: 8px 0;
}

@media screen and (max-width: 767px) {
    .sticky-header {
        height: 50px;
        line-height: 10px;
    }
}
</style>