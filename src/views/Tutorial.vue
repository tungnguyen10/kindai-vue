<template>
  <div :class="[ showModal == true ? 'modal-open':'' , 'tutorial']">
    <div :class="['avatar_area' , choose_bg == choose_bg ? 'bg_0' + choose_bg :'']" >
      <div class="help" @click="step=1">?</div>
      <ul class="change_color" v-if="tab_active > 1 && choose_items[tab_active-1] && choose_items[tab_active-1].index != 0">
        <li :class="[choose_items[tab_active-1] && choose_items[tab_active-1].color == i ? 'active':'' , 'btn-item']" v-for="i in 3" :key="i" @click="chooseItemColor(tab_active, choose_items[tab_active-1].index, i)">
          <p>
            <img :src="require('../assets/images/item_0' + tab_active + '_0' + choose_items[tab_active-1].index + '_0' + i + '_thums.png')" alt="" v-if="choose_items[tab_active-1] && choose_items[tab_active-1].index != 0">
          </p>
        </li>
      </ul>
      <div class="bg-change" id="show-modal" @click="showModal = true"></div>
      <div class="choose_bg" v-if="showModal" >
        <p class="close" @click="showModal = false"><img src="../assets/images/btn_close.png" alt="close"></p>
        <ul>
          <li v-for="i in 6" :key="i" :class="[ choose_bg == i ? 'active' : '', 'change_0' + i ,'btn-item']"  @click="choose_bg= i" >
            <p><img :src="require('../assets/images/icon_color0' + i + '.png')" alt=""></p>
          </li>
        </ul>
      </div>

      <div :class="[first_time[6] || choose_items[6] && (choose_items[5].index == 0 && choose_items[6].index == 0) ? 'disabled' : '', 'btn btn-submit']" @click="changePage('/kekka')"></div>

      <div class="avatar">
        <img :src="require('../assets/images/item_01_0' + choose_items[0].index + '_01.png')" alt="">

        <img class="item04" :src="require('../assets/images/item_05_0' + choose_items[4].index + '_0' + choose_items[4].color + '.png')" alt="" v-if="choose_items[4]">
        <img class="item03" :src="require('../assets/images/item_04_0' + choose_items[3].index + '_0' + choose_items[3].color + '.png')" alt="" v-if="choose_items[3]">
        <img class="item02" :src="require('../assets/images/item_03_0' + choose_items[2].index + '_0' + choose_items[2].color + '.png')" alt="" v-if="choose_items[2]">
        <img class="item01" :src="require('../assets/images/item_02_0' + choose_items[1].index + '_0' + choose_items[1].color + '.png')" alt="" v-if="choose_items[1]">
        <img class="item06" :src="require('../assets/images/item_07_0' + choose_items[6].index + '_0' + choose_items[6].color + '.png')" alt="" v-if="choose_items[6] && choose_items[6].index != 0">
        <img class="item05" :src="require('../assets/images/item_06_0' + choose_items[5].index + '_0' + choose_items[5].color + '.png')" alt="" v-if="choose_items[5] && choose_items[5].index != 0">
        
      </div>
    </div>

    <div class="tab_area">
      <ul class="tab_list">
        <li :class="[i == tab_active ? 'active' : '', i > tab_active + 1 && first_time[i-2] ? 'disabled' : '', 'tab']" v-for="i in 7" :key="i" @click="changeTab(i)">
          <img :src="require('../assets/images/icon_tab_0' + i + '.png')" alt="">
        </li>
      </ul>
      <div class="tab_content">
        <div class="item_list">
          <div :class="[choose_items[tab_active-1] && choose_items[tab_active-1].index == 0 ? 'active' : '', 'item btn-item']" @click="chooseItem(tab_active, 0)" v-if="tab_active == 6 || tab_active == 7">
            <p><img :src="require('../assets/images/x.png')" alt=""></p>
          </div>
          <div :class="[choose_items[tab_active-1] && choose_items[tab_active-1].index == i ? 'active' : '', 'item btn-item']" v-for="i in 6" :key="i" @click="chooseItem(tab_active, i)">
            <p><img :src="require('../assets/images/item_0' + tab_active + '_0' + i + '_01_thums.png')" alt=""></p>
          </div>
        </div>
      </div>
    </div>

    <div class="popup" v-show="step <= 6 && first_time_open">
      <div class="popup__step step1 down" v-show="step == 1">
        <h2>STEP1</h2>
        <dl class="step_txt"> 
          <dt>好きなパーツを選ぼう</dt>
          <dd>横にスクロールしてね</dd>
        </dl>
      </div>
      <div class="popup__step step2 left" v-show="step == 2">
        <h2>STEP2</h2>
        <dl class="step_txt"> 
          <dt>好きなカラーを選ぼう</dt>
        </dl>
      </div>
      <div class="popup__step step3 down" v-show="step == 3">
        <h2>STEP3</h2>
        <dl class="step_txt"> 
          <dt>カテゴリが選択できるよ</dt>
        </dl>
      </div>
      <div class="popup__step step4 right" v-show="step == 4">
        <h2>STEP4</h2>
        <dl class="step_txt"> 
          <dt>好きな背景を選ぼう</dt>
        </dl>
      </div>
      <div class="popup__step step5 down" v-show="step == 5">
        <h2>STEP5</h2>
        <dl class="step_txt"> 
          <dt>アクセサリーは必ず<br> 1つは選んでね</dt>
          <dd>※1つもアクセサリーを選んでいないと<br>完成ボタンが押せないよ</dd>
        </dl>
      </div>
      <div class="popup__step step6 down" v-show="step == 6">
        <h2>STEP6</h2>
        <dl class="step_txt"> 
          <dt>完成したら<br> SNSでシェアしてね</dt>
          <dd>※選んでいないカテゴリがあると<br>完成ボタンは出てこないよ</dd>
        </dl>
      </div>
      <p class="btn-next-step" @click="step++"><img src="../assets/images/icon_play.png" alt=""></p>
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
// window.axios = require('axios');
const axios = require('axios');
import { globalFuncs } from '../main.js'
export default {
  
  name: 'Tutorial',
  data() {
    return {
      step: 1,
      tab_active: 1,
      showModal: false,
      first_time: [false, true, true, true, true, true, true],
      first_time_open: globalFuncs.first_time_open,
      choose_bg: 1,
      choose_items: [
        {
          index: 1,
          color: 1
        }
      ],
    }
  },
  methods: {
    changePage: function (i) {
      // localStorage.choose_items = JSON.stringify(this.choose_items);
      // localStorage.choose_bg = JSON.stringify(this.choose_bg);
      let obj = {"body":this.choose_items[0].index,
      "hair":{"value":this.choose_items[1].index,"color":this.choose_items[1].color},
      "top":{"value":this.choose_items[2].index,"color":this.choose_items[2].color},
      "bottom":{"value":this.choose_items[3].index,"color":this.choose_items[3].color},
      "shoes":{"value":this.choose_items[4].index,"color":this.choose_items[4].color},
      "accessories1":{"value":this.choose_items[5].index,"color":this.choose_items[5].color},
      "accessories2":{"value":this.choose_items[6].index,"color":this.choose_items[6].color},
      "background":this.choose_bg};

      axios({
        headers: {
          'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        method: 'POST',
        url: '/api/',
        // url: 'http://kindai.test:8080/api/',
        data: {
          options: JSON.parse(JSON.stringify(obj)),
        }
      }).then(function (response) {
        console.log(response);
        globalFuncs.idApi= response.data.options.id;
        globalFuncs.nextPage(i);
      });

		},
    changeTab: function(i) {
      this.tab_active = i;
      this.first_time[i-1] = false; 
      if (i > this.choose_items.length) {
        this.choose_items.push({
          index: 1,
          color: 1
        })
      }
      $('.tutorial .tab_area .tab_content').scrollLeft(0);
    },
		chooseItem: function(a, b) {
      if (a-1 < this.choose_items.length) {
        this.choose_items[a-1].index = b;
        this.choose_items[a-1].color = 1;
      }
      else {
        this.choose_items.push({
          index: b,
          color: 1
        })
      }
    },
		chooseItemColor: function(a, b, c) {
      this.choose_items[a-1].index = b;
      this.choose_items[a-1].color = c;
    }

	},
  updated() {

  },
	mounted() {
		
	},
  
}
</script>

<style lang="scss">
  @import "../assets/css/tutorial.scss"; 
</style>