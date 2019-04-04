<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper" @click.self="$emit('close')">
        <div class="modal-container">

          <div class="modal-body">
            <div>
                <div>
                    <div class="file has-name is-left is-small">
                      <label class="file-label">
                        <input type="file" class="file-input" name="resume"  @change="imageChanged">
                        <span class="file-cta">
                          <span class="file-icon">
                            <i class="fas fa-upload"></i>
                          </span>
                          <span class="file-label">
                            画像を選択
                          </span>
                        </span>
                      </label>
                    </div>
                    
                </div>
            </div>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              <div class="btn-save-wrapper">
                  <button type="button" @click.prevent="submit(icon)" class="button is-small btn-save">保存</button>
              </div>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>  
</template>


<script>
import { mapGetters } from 'vuex';

export default {
  name: 'image-modal',
  data() {
    return {
      icon: ''
    }
  },
  computed: {
    ...mapGetters({
      clubData: 'club/clubData'
    })
  },
  methods: {
      imageChanged(e) {
            console.log(e.target.files[0])
            let fileReader = new FileReader() 
            fileReader.readAsDataURL(e.target.files[0])
            fileReader.onload = (e) => {
                this.icon = e.target.result
            }
        },
  },
  props: {
    submit: {
      type: Function,
      default: () => (["icon"])
    }
  }
}
</script>

<style scoped>
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
  width: 320px;
  margin: 0px auto;
  padding: 80px 16px;
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
  text-align: center;
  /*margin-bottom: 96px;*/
}

.modal-default-button {
  float: right;
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
.control {
  padding-bottom: 8px;
}
.input {
  margin-bottom: 8px;
}

.btn-save-wrapper {
    text-align: right;
}
.btn-save {
    background-color: rgba(5, 40, 247, 95);
    border: none;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    margin-bottom: 3px;
    /*width: 12%;*/
}
</style>