<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper" @click.self="$emit('close')">
        <div class="modal-container">

          <div class="modal-body">
            <slot name="body">
              <div class="day">{{ day }}</div>
            </slot>
            
            <div>
              <!--<div class="field has-addons subject">-->
              <div>
                <input type="text" class="input"  style="border: 1px solid #e0e0e0;" placeholder="練習名を入力" v-model="title" required autofocus>
                <div class="control">
                    <div class="select">
                        <select v-model="tag">
                            <option disabled value="">タグ選択</option>
                            <option value=1>1:{{ clubData[0].tag_one }}</option>
                            <option value=2>2:{{ clubData[0].tag_two }}</option>
                            <option value=3>3:{{ clubData[0].tag_three }}</option>
                            <option value=4>4:{{ clubData[0].tag_four }}</option>
                            <option value=5>5:{{ clubData[0].tag_five }}</option>
                        </select>
                    </div>
                </div>
              </div>
              
              <div class="control">
                  <div class="select">
                      <select v-model="schedule">
                          <option disabled value="">スケジュール選択</option>
                          <option>練習</option>
                          <option>休み</option>
                          <option>試合</option>
                          <option>未定</option>
                      </select>
                  </div>
              </div>
              
              <div class="control">
                  <div class="start-end-time">
                    <div class="start-time">開始</div>
                    <div class="input-time">
                      <input class="input" type="time" list="data1" v-model="start_time" required autofocus>
                    </div>
                  </div>
                  
                  <div class="start-end-time"> 
                    <div class="end-time">終了</div>
                    <div class="input-time">
                      <input class="input" type="time" list="data1" v-model="end_time" required autofocus>
                    </div>
                  </div>
              </div>
              
              
              <datalist id="data1">
                <option value="09:00"></option><option value="09:30"></option><option value="10:00"></option><option value="10:30"></option>
                <option value="11:00"></option><option value="11:30"></option><option value="12:00"></option><option value="12:30"></option>
                <option value="13:00"></option><option value="13:30"></option><option value="14:00"></option><option value="14:30"></option>
                <option value="15:00"></option><option value="15:30"></option><option value="16:00"></option><option value="16:30"></option>
                <option value="17:00"></option><option value="17:30"></option><option value="18:00"></option><option value="18:30"></option><option value="19:00"></option>
              </datalist>
              
              <div class="control">
                  <input class="input" type="text" placeholder="参考URLを貼付"  v-model="url" required autofocus style="border: 1px solid #e0e0e0;">
              </div>
              <div class="control">
                  <input class="input" type="text" placeholder="メニュー内容の説明を記入"  v-model="description" required autofocus style="border: 1px solid #e0e0e0;">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              <div class="btn-save-wrapper">
                  <button type="button" @click.prevent="submit(title, schedule, tag, start_time, end_time, url, description)" class="button is-small btn-save">保存</button>
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
  name: 'day-modal',
  data() {
    return {
      title: '',
      schedule: '',
      tag: '',
      start_time: '',
      end_time : '',
      url: '',
      description: ''
    }
  },
  computed: {
    ...mapGetters({
      clubData: 'club/clubData'
    })
  },
  props: {
    day: String,
    submit: {
      type: Function,
      default: () => (["title", "schedule", "tag", "start_time", "end_time", "url", "description"])
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
  padding: 8px 16px;
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
}

.day {
  margin: 8px 0 16px;
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
.start-end-time {
  display: flex;
}
/*.input-time {*/
/*  width: 32%;*/
/*}*/
.start-time {
  margin: 8px 8px 0 0;
  vertical-align: middle;
}
.end-time {
  margin: 8px 8px 0 0;
  vertical-align: middle;
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