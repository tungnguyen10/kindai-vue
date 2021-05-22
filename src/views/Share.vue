<template>
  <div class="kekka share"> 
    <div :class="['avatar_area' , choose_bg == choose_bg ? 'bg_0' + choose_bg :'']" id="result-wrapper">
      <p class="btn-home" @click="openModal('play-again')"><img src="../assets/images/btn_home.png" alt=""></p>
      <div :class="['confirm-img avatar', light == 1 ? 'active':'']">
        <div class="result-wrapper">
          <img class="item" @load="onImgLoad(1)" :src="require('../assets/images/item_01_0' + choose_items.body + '_01.png')" alt="" v-if="choose_items.body">
          
          <img class="item item04" @load="onImgLoad(2)" :src="require('../assets/images/item_05_0' + choose_items.shoes.value + '_0' + choose_items.shoes.color + '.png')" alt="" v-if="choose_items.shoes">
          <img class="item item03" @load="onImgLoad(3)" :src="require('../assets/images/item_04_0' + choose_items.bottom.value + '_0' + choose_items.bottom.color + '.png')" alt="" v-if="choose_items.bottom">
          <img class="item item02" @load="onImgLoad(4)" :src="require('../assets/images/item_03_0' + choose_items.top.value + '_0' + choose_items.top.color + '.png')" alt="" v-if="choose_items.top">
          <img class="item item01" @load="onImgLoad(5)" :src="require('../assets/images/item_02_0' + choose_items.hair.value + '_0' + choose_items.hair.color + '.png')" alt="" v-if="choose_items.hair">
          <img class="item item06" @load="onImgLoad(6)" :src="require('../assets/images/item_07_0' + choose_items.accessories2.value + '_0' + choose_items.accessories2.color + '.png')" alt="" v-if="choose_items.accessories2 && choose_items.accessories2.value != 0">
          <img class="item item05" @load="onImgLoad(7)" :src="require('../assets/images/item_06_0' + choose_items.accessories1.value + '_0' + choose_items.accessories1.color + '.png')" alt="" v-if="choose_items.accessories1 && choose_items.accessories1.value != 0">  
        </div>

        <img class="result" alt="" :src="result_src">
        
      </div>
      
    </div>
    <p class="save">長押しで画像保存しよう！</p>
    <PlayAgain titleshare="他にもたくさんのアイテムがあるよ！" imgPlay="kekka_btn" alt="もう一度遊ぶ" @playAgain="openModal('play-again')"/>
    <Sharebottom titleshare="皆にコーデをシェアしよう" img1_share="img_ufo" img2_share="img_three" :share_url="url + '/' + id"/>
    <div class="box-copy">
      <h2 class="ttl-share">タップでURLがコピーできるよ</h2>
      <div id="copy-url" class="copy-url" @click="copyClipboard()">{{ url }}/{{$route.params.id}}</div>
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
      choose_items: '',
      choose_bg: '',
      light: '',
      result_src: '',
      check_load: [false, false, false, false, false, false],
      url: globalFuncs.baseUrl + '/share',
      id: this.$route.params.id
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
      // url: 'http://kindai.test/api/',
      params: {
        uuid: self.$route.params.id,
      }
    }).then(function (response) {
      // console.log(response.data.options.options.background);
      self.choose_items = JSON.parse(response.data.options.options);
      self.choose_bg = JSON.parse(response.data.options.options).background;
      self.light = JSON.parse(response.data.options.options).light;

      // console.log(JSON.parse(response.data.options.options));
    });
  },
	mounted() {
    let self = this;

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