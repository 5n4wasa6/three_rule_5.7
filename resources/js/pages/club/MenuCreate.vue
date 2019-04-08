<template>
    <div>
        <div class="sticky-header">
            <p>メニュー作成</p>
        </div>

        <div class="menu-container">
            <div class="content-point">
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
                    <input class="input" type="text" v-model="title" placeholder="練習メニュー名を記入" required autofocus>
                </div>
                <div class="control">
                    <span class="box-title">URL</span>
                    <input class="input" type="text" v-model="url" placeholder="参考URLを貼付" required autofocus>
                </div>
                <div class="control">
                    <span class="box-title">説明</span>
                    <!--<input class="input" type="text" v-model="description" placeholder="練習メニューの内容を記入" required autofocus>-->
                    <textarea class="textarea" v-model="description" placeholder="練習メニューの内容を記入"></textarea>
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
import axios  from 'axios'
import swal from 'sweetalert';
import { mapGetters } from 'vuex';

export default {
    components: {
        StickyFooter
    },
    data () {
        return {
            tag:     '',
            title:         '',
            url:        '',
            description:   '',
        }
    },
    computed: {
        ...mapGetters({
            clubData: 'club/clubData',
            // myClubMenu: 'menu/myClubMenu'
            clubData: 'club/clubData'
        }),
    },
    methods: {
        onSubmit() {
            const params = {
                tag:         this.tag,
                title:       this.title,
                url:         this.url,
                description: this.description
            };
            
            axios.post('club/'+ this.$route.params.id+'/user/'+ this.$route.params.user_id +'/menu', params)
                .then(response => {
                    swal("Created!", "Your product has been done!", "success")
                    this.$router.push('/club/'+ this.$route.params.id +'/menu')
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
.menu-container {
    padding:  64px 8px;
    width: 100%;
}

.control {
    margin-top: 8px;
}
.input {
    margin-top: 8px 0;
}

.btn-create-wrapper {
    margin-top: 24px;
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