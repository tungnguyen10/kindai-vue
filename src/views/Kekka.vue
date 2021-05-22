<template>
  <div :class="['kekka']">
    <div :class="['avatar_area' , choose_bg == choose_bg ? 'bg_0' + choose_bg :'']" id="result-wrapper">
      <p class="btn-home" data-html2canvas-ignore @click="openModal('play-again')"><img src="../assets/images/btn_home.png" alt=""></p>
      <p class="btn-home right" data-html2canvas-ignore @click='toggleLight()'><img src="../assets/images/btn_light.png" alt=""></p>

      <div :class="['confirm-img avatar', light == true? 'active':'']">
        <div class="result-wrapper">
          <img class="item" @load="onImgLoad(1)" :src="require('../assets/images/item_01_0' + choose_items.body + '_01.png')" alt="" v-if="choose_items.body">
          
          <img class="item item04" @load="onImgLoad(2)" :src="require('../assets/images/item_05_0' + choose_items.shoes.value + '_0' + choose_items.shoes.color + '.png')" alt="" v-if="choose_items.shoes">
          <img class="item item03" @load="onImgLoad(3)" :src="require('../assets/images/item_04_0' + choose_items.bottom.value + '_0' + choose_items.bottom.color + '.png')" alt="" v-if="choose_items.bottom">
          <img class="item item02" @load="onImgLoad(4)" :src="require('../assets/images/item_03_0' + choose_items.top.value + '_0' + choose_items.top.color + '.png')" alt="" v-if="choose_items.top">
          <img class="item item01" @load="onImgLoad(5)" :src="require('../assets/images/item_02_0' + choose_items.hair.value + '_0' + choose_items.hair.color + '.png')" alt="" v-if="choose_items.hair">
          <img class="item item06" @load="onImgLoad(6)" :src="require('../assets/images/item_07_0' + choose_items.accessories2.value + '_0' + choose_items.accessories2.color + '.png')" alt="" v-if="choose_items.accessories2 && choose_items.accessories2.value != 0">
          <img class="item item05" @load="onImgLoad(7)" :src="require('../assets/images/item_06_0' + choose_items.accessories1.value + '_0' + choose_items.accessories1.color + '.png')" alt="" v-if="choose_items.accessories1 && choose_items.accessories1.value != 0">
        </div>

        <img class="result" alt="" :src="result_src" >
        
      </div>
    </div>
    <p class="save">長押しで画像保存しよう！</p>
    <Sharebottom titleshare="今すぐコーデをシェアしよう" img1_share="img_heart" img2_share="img_bee" :share_url="url + '/' + id"/>
    
    <div class="content_present">
      <h2 class="ttl">近大学科ファッション％</h2>
      <div class="box">
        <dl>
          <dt>農業生産科学科</dt>
          <dd><div class="present_item"><k-progress :class="[chart[0] == 0 ? 'zero orange' : '']" type="line" :percent="Number(chart[0].toFixed(1))" :show-text="true" color="#ffb607" :line-height="20"></k-progress></div></dd>
        </dl>
        <dl>
          <dt>水産学科</dt>
          <dd><div class="present_item"><k-progress :class="[chart[1] == 0 ? 'zero blue' : '']" type="line" :percent="Number(chart[1].toFixed(1))" :show-text="true" color="#29a7ff" :line-height="20"></k-progress></div></dd>
        </dl>
        <dl>
          <dt>応用生命化学科</dt>
          <dd><div class="present_item"><k-progress :class="[chart[2] == 0 ? 'zero yell' : '']" type="line" :percent="Number(chart[2].toFixed(1))" :show-text="true" color="#ffec4c" :line-height="20"></k-progress></div></dd>
        </dl>
        <dl>
          <dt>食品栄養学科</dt>
          <dd><div class="present_item"><k-progress :class="[chart[3] == 0 ? 'zero pink' : '']" type="line" :percent="Number(chart[3].toFixed(1))" :show-text="true" color="#f986c4" :line-height="20"></k-progress></div></dd>
        </dl>
        <dl>
          <dt>環境管理学科</dt>
          <dd><div class="present_item"><k-progress :class="[chart[4] == 0 ? 'zero aqua' : '']" type="line" :percent="Number(chart[4].toFixed(1))" :show-text="true" color="#63e2d5" :line-height="20"></k-progress></div></dd>
        </dl>
        <dl>
          <dt>生物機能科学科</dt>
          <dd><div class="present_item"><k-progress :class="[chart[5] == 0 ? 'zero red' : '']" type="line" :percent="Number(chart[5].toFixed(1))" :show-text="true" color="#ff674e" :line-height="20"></k-progress></div></dd>
        </dl>
      </div>
      <div class="box">
        <dl class="txt">
          <dt>あなたのコーディネート結果は</dt>
          <dd><span :class="[selected_major == 0 ? 'orange' : selected_major == 1 ? 'blue' : selected_major == 2 ? 'yell' : selected_major == 3 ? 'pink' : selected_major == 4 ? 'aqua' : 'red']">{{ selected_major == 0 ? '農業生産科学科' : selected_major == 1 ? '水産学科' : selected_major == 2 ? '応用生命化学科' : selected_major == 3 ? '食品栄養学科' : selected_major == 4 ? '環境管理学科' : '生物機能科学科' }}</span>でした！</dd>
          </dl>
      </div>
      <p class="note">※この結果は実際の学科を決定するものではありません。</p>
    </div>
    <div class="content_colection">
      <h2 class="ttl">アイテム紹介</h2>
      <div class="box-items">
        <div class="item" v-for="i in 6" :key="i" v-show="!(i == 6 && choose_items.accessories2 && choose_items.accessories2.value == 0 || i == 5 && choose_items.accessories1 && choose_items.accessories1.value == 0)">
          <h3>KINDAIマグロバッグ</h3>
          <div class="item-box">
            <div class="item-box__left">
              <img :src="require('../assets/images/item_02_0' + choose_items.hair.value + '_01_thums.png')" alt="" v-if="i == 1 && choose_items.hair">
              <img :src="require('../assets/images/item_03_0' + choose_items.top.value + '_01_thums.png')" alt="" v-if="i == 2 && choose_items.top">
              <img :src="require('../assets/images/item_04_0' + choose_items.bottom.value + '_01_thums.png')" alt="" v-if="i == 3 && choose_items.bottom">
              <img :src="require('../assets/images/item_05_0' + choose_items.shoes.value + '_01_thums.png')" alt="" v-if="i == 4 && choose_items.shoes">
              <img :src="require('../assets/images/item_06_0' + choose_items.accessories1.value + '_01_thums.png')" alt="" v-if="i == 5 && choose_items.accessories1 && choose_items.accessories1.value != 0">
              <img :src="require('../assets/images/item_07_0' + choose_items.accessories2.value + '_01_thums.png')" alt="" v-if="i == 6 && choose_items.accessories2 && choose_items.accessories2.value != 0">
            </div>
            <div class="item-box__right">
              <h4>世界初！<br>クロマグロの完全養殖実現！</h4>
              <p class="des">近大農学部水産学科が世界で初めてクロマグロの完全養殖に成功したことを記念した限定バッグ。</p>
              <div class="btn btn-more"><p>詳しく見る</p></div>
            </div>
          </div>
        </div>
      </div>
      <p class="photo"><img src="../assets/images/kekla_img_kaisou.png" alt=""></p>
    </div>
    <PlayAgain titleshare="他にもたくさんのアイテムがあるよ！" imgPlay="kekka_btn" alt="もう一度遊ぶ" @playAgain="openModal('play-again')" />
    <Sharebottom titleshare="皆にコーデをシェアしよう" img1_share="img_ufo" img2_share="img_three" :share_url="url + '/' + id"/>
    <div class="box-copy">
      <h2 class="ttl-share">タップでURLがコピーできるよ</h2>
      <div id="copy-url" class="copy-url" @click="copyClipboard()">{{ url }}/{{id}}</div>
    </div>

    <div class="popup play-again">
      <div class="popup__content" id="play-again">
        <h2>TOPページに戻る</h2>
        <div class="popup__content_box">
          <div class="txt">今の内容が破棄されてTOPページに戻ります。<br>よろしいですか？</div>
          <ul>
            <li class="btn" @click="closeModal()"><span>いいえ</span></li>
            <li class="btn" @click="closeModal(), changePage('/')"><span>はい</span></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
import { globalFuncs } from '../main.js'
import Sharebottom from '@/components/Sharebottom.vue'
import PlayAgain from '@/components/PlayAgain.vue'
import html2canvas from 'html2canvas'

const axios = require('axios');

export default {
  name: 'Kekka',
  data() {
    return {
      light: true,
      id: globalFuncs.idApi,
      choose_items: '',
      choose_bg: '',
      result_src: '',
      check_load: [false, false, false, false, false, false],
      url: globalFuncs.baseUrl + '/share',
      chart: [0, 0, 0, 0, 0, 0],
      selected_major: ''
      // openPlayAgain: false,
    }
  },
  components: {
    Sharebottom,
    PlayAgain,
  },
  methods: {
    changePage: function (i) {
			globalFuncs.nextPage(i);
		},
    copyClipboard: function(){
      var $temp = $('<input>');
      $("body").append($temp);
      $temp.val($("#copy-url").text()).select();
      document.execCommand("copy");
      $('.copy-url').addClass('open');
      setTimeout(function() { 
       $('.copy-url').removeClass('open');
      }, 1000);
      $temp.remove();
    },
    toggleLight: function() {
      let self = this;
      self.light = !self.light;

      self.choose_items.light = self.light ? 1 : 0;

      // console.log(self.choose_items);

      setTimeout(function() {
        html2canvas($("#result-wrapper")[0], {backgroundColor:null}).then(canvas => {
          self.result_src = canvas.toDataURL();
        });
      }, 500)

      axios({
        headers: {
          'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        method: 'POST',
        url: '/api/',
        // url: 'http://kindai.test:8080/api/',
        data: {
          uuid: this.id,
          options: JSON.parse(JSON.stringify(self.choose_items))
        }
      }).then(function (response) {
        console.log(response);

      });

    },
    openModal: function(id){
      globalFuncs.openModal(id);
    },
    closeModal: function(){
      globalFuncs.closeModal();
    },
    onImgLoad: function(i) {
      let self = this;
      self.check_load[i-1] = true;
      if (self.check_load.filter(x => x===true).length == self.check_load.length) {
        html2canvas($("#result-wrapper")[0], {backgroundColor:null}).then(canvas => {
          self.result_src = canvas.toDataURL();
        });
      }
    }
	},
  beforeMount() {
    let self = this;
    axios({
      headers: {
        'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      method: 'GET',
      url: '/api/',
      // url: 'http://kindai.test:8080/api/',
      params: {
        uuid: this.id,
      }
    }).then(function (response) {
      console.log(response.data.options.options);
      self.choose_items = JSON.parse(response.data.options.options);
      self.choose_bg = JSON.parse(response.data.options.options).background;
      var chart = response.data.options.content.chart;
      Object.entries(chart).forEach(function(item, i) {
        // console.log(item);
        self.chart[item[0]-1] = item[1];
      });
      self.selected_major = self.chart.indexOf(Math.max(...self.chart));
    });
  },
	mounted() {
    let self = this;
    $(".content_present .k-progress-text").each(function() {
      var t = $(this);
      t.parent().find('.k-progress-outer-line').append(t);
    })

    globalFuncs.first_time_open = false;
    
    $(".popup").click(function () {
      if(!$(event.target).closest('.popup .popup__content').length ) {
        globalFuncs.closeModal();
      }
    });
	},
  
}
</script>

<style lang="scss">
  @import "../assets/css/kekka.scss"; 
</style>