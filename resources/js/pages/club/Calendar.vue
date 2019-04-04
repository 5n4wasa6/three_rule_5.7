<template>
      <div>
        <div>
            <!--<full-calendar v-if="!getAllData" locale="en" @dayClick="dayModalToggle" @eventClick="eventModalToggle" :firstDay=1 /> -->
            <full-calendar :events="getAllData" @dayClick="dayModalToggle" @eventClick="eventModalToggle" :firstDay=1 />
            <day-modal v-if="dayModalShow" @close="dayModalToggle" :day="day" :submit="handleSubmit"/>
            <event-modal v-if="eventModalShow" @close="eventModalToggle" :text="text" :schedule="schedule" :tag="tag" :start_time="start_time" :end_time="end_time" :url="url" :description="description" />
        </div>
        <sticky-footer></sticky-footer>
      </div>
</template>

<script>
import StickyFooter from '../../components/club/StickyFooter';
import DayModal from '../../components/calendar/DayModal'
import EventModal from '../../components/calendar/EventModal'
import { mapActions, mapGetters } from 'vuex'

export default {
  data () {
    return {
      dayModalShow: false,
      eventModalShow: false,
      text: '',
      tag: '',
      schedule: '',
      start_time: '',
      end_time: '',
      url: '',
      description: '',
      day: ''
    }
  },
  computed: {
    ...mapGetters({
      getAllData: 'calendar/getAllData',
      clubData: 'club/clubData'
    })
  },
  components : {
    StickyFooter,
    DayModal,
    EventModal,
	  'full-calendar': require('vue-fullcalendar')	
  },
  created() {
    this.getData()
  },
  methods: {
    // ...mapActions({
    //   getData: 'calendar/getData',
    //   addData: 'calendar/addData',
    // }),
    getData(club_id) {
      this.$store.dispatch('calendar/getData', this.$route.params.id)
    },
    addData(start, title, schedule, tag, start_time, end_time, url, description, club_id) {
      console.log(url);
      
      this.$store.dispatch('calendar/addData', {
        start:       start.start,
        title:       title.title,
        schedule:    schedule.schedule,
        tag:         tag.tag,
        start_time:  start_time.start_time,
        end_time:    end_time.end_time,
        url:         url.url,
        description: description.description,
        club_id: this.$route.params.id
      })
    },
    dayModalToggle(day) {
      if(day) {
        this.day = `${day.getFullYear()}-${day.getMonth() + 1}-${day.getDate()}`
      }
      this.dayModalShow = !this.dayModalShow
    },
    eventModalToggle(text) {
      if(text) {
          // console.log(text);
        this.text        = text.title,
        this.tag         = text.tag,
        this.schedule    = text.schedule,
        this.start       = text.start,
        this.start_time  = text.start_time,
        this.end_time    = text.end_time,
        this.url         = text.url,
        this.description = text.description
      }
      this.eventModalShow = !this.eventModalShow
    },
    handleSubmit(text, schedule, tag, start_time, end_time, url, description) {
      this.addData({start: this.day}, {title: text}, {schedule: schedule}, {tag: tag}, {start_time: start_time}, {end_time: end_time}, {url: url}, {description: description})
      this.day = ''
      this.dayModalShow = !this.dayModalShow
    }
  }
}
</script>

<style>
/*.sticky-header {*/
/*    width: 100%;*/
/*    height: 50px;*/
/*    line-height: 16px;*/
/*    position: fixed;*/
/*    top: 0;*/
/*    border-bottom: 1px solid rgba(0, 0, 0, 0.05);*/
/*    background-color: #FCFCFC;*/
/*    z-index: 999;*/
/*}*/
/*.sticky-header p {*/
/*    position: absolute;*/
/*    text-align: center;*/
/*    top: 50%;*/
/*    left: 50%;*/
/*    -ms-transform: translate(-50%,-50%);*/
/*    -webkit-transform: translate(-50%,-50%);*/
/*    transform: translate(-50%,-50%);*/
/*    margin:0;*/
/*    padding:0;*/
/*    font-weight: bold;*/
/*    font-size: 16px;*/
/*}*/

.comp-full-calendar {
  padding: 36px 16px;
}
.full-calendar-header {
  margin-bottom: 24px;
}

.title {
  font-size: 24px;
}
.weeks {
  background-color: rgba(5, 40, 247, 95);
}
.week {
  color: white;
}
.full-calendar-body .dates .week-row .day-cell {
  min-height: 90px;
}
.full-calendar-body .dates .dates-events .events-week .events-day {
  cursor: pointer;
  flex: 1;
  min-height: 90px;
  overflow: hidden;
  text-overflow: ellipsis;
}
.full-calendar-body .dates .dates-events .events-week .events-day .event-box .event-item {
  background-color: rgba(242, 27, 7, 100);
  color: white;
  font-weight: bold;
}
.full-calendar-body .dates .dates-events .events-week .events-day .event-box .event-item.is-start {
  margin-left: 2px;
  margin-right: 2px;
}


@media screen and (max-width: 767px) {
    .sticky-header {
        height: 50px;
        line-height: 10px;
    }
}




/*.full-calendar-body .dates .more-events .more-body {*/
/*        height: 140px;*/
/*        overflow: hidden;*/
/*}*/
/*.full-calendar-body .dates .more-events .more-body .body-list {*/
/*          height: 120px;*/
/*          padding: 5px;*/
/*          overflow: auto;*/
/*          background-color: #fff;*/
/*}*/

</style>





