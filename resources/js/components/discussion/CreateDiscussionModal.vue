<template>
    <div>
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper" @click.self="$emit('close')">
                    <div class="modal-container">
                    
                        <div class="modal-header">
                            <slot name="header"></slot>
                        </div>
                    
                        <div class="modal-body">
                            <slot name="body">
                                <!--<img :src="image">-->
                                <!--<input type="file" name="" @change="onFileChange">-->
                                
                                <!--<div class="file has-name is-left is-small">-->
                                <!--  <label class="file-label">-->
                                <!--    <input class="file-input" type="file" name="resume" @change="onFileChange">-->
                                <!--    <span class="file-cta">-->
                                <!--      <span class="file-icon">-->
                                <!--        <i class="fas fa-upload"></i>-->
                                <!--      </span>-->
                                <!--      <span class="file-label">-->
                                <!--        画像を選択-->
                                <!--      </span>-->
                                <!--    </span>-->
                                <!--  </label>-->
                                <!--</div>-->
                                <div class="posting">
                                    <textarea class="textarea" v-model="body" placeholder="投稿を記入する"></textarea>
                                </div>
                            </slot>
                        </div>
                        
                        <div class="modal-footer">
                            <slot name="footer">
                                <div class="btn-create-wrapper">
                                    <button type="button"  @click.prevent="submit" class="button is-small btn-create">投稿</button>
                                </div>
                            </slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    data() {
        return {
            image: '',
            body: ''
        }
    },
    props: {
        
    },
    methods: {
        // ...mapActions({
        //     addDiscussion: 'discussion/addDiscussion'
        // }),
        addDiscussion(body, image, club_id) {
          this.$store.dispatch('discussion/addDiscussion', {
              body: body, 
              image: image, 
              club_id: this.$route.params.id
          })
        },
        onFileChange(e) {
            if (e.target.files.length === 0) {
              this.reset()
              return false
            }
            if (! event.target.files[0].type.match('image.*')) {
              this.reset()
              return false
            }
            let files = e.target.files || e.dataTransfer.files
            this.createImg(files[0])
        },
        createImg(item) {
            let reader = new FileReader()
            reader.onload = (e) => {
                console.log(e.target.result)
                this.image = e.target.result
            }
            reader.readAsDataURL(item);
        },
        
        reset () {
            this.image = ''
            this.$el.querySelector('input[type="file"]').value = null
        },
        submit() {
            this.addDiscussion({ body: this.body, image: this.image })
            this.$emit('close')
        }
    }
}
</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}




.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
  text-align: center;
}
.posting {
    margin-top: 8px;
}
.btn-create-wrapper {
    margin-top: 16px;
    text-align: right;
}
.btn-create {
    background-color: rgba(5, 40, 247, 95);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    /*width: 25%;*/
    /*padding: 8px 8px 8px;*/
}
.modal-default-button {
  float: right;
  background-color: #f8f8f8;
  
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

textarea {
    border: 1px solid #aaa;
    padding: 8px;
}
</style>