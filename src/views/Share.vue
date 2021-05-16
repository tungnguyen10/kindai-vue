<template>
  <div :class="[openPlayAgain == true ? 'active':''  ,'kekka']">
    <p class="btn-home" @click="openPlayAgain=!openPlayAgain"><img src="../assets/images/btn_home.png" alt=""></p>
    <p :class="['confirm-img']" ><img src="../assets/images/kekka_image_confirm_01.png" alt=""></p>
    <p class="save">長押しで画像保存しよう！</p>
    <PlayAgain titleshare="他にもたくさんのアイテムがあるよ！" imgPlay="kekka_btn" alt="もう一度遊ぶ"/>
    <Sharebottom titleshare="皆にコーデをシェアしよう" img1_share="img_ufo" img2_share="img_three"/>
    <div class="box-copy">
      <h2 class="ttl-share">タップでURLがコピーできるよ</h2>
      <div id="copy-url" class="copy-url" @click="copyClipboard()">https://Sample.com</div>
    </div>
    <div class="play-again" v-if="openPlayAgain">
      <h2>TOPページに戻る</h2>
      <div class="txt">今の内容が破棄されてTOPページに戻ります。<br>よろしいですか？</div>
      <ul>
        <li class="btn" @click="openPlayAgain = false"><span>いいえ</span></li>
        <li class="btn" @click="changePage('/')"><span>はい</span></li>
      </ul>
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
import { globalFuncs } from '../main.js'
import Sharebottom from '@/components/Sharebottom.vue'
import PlayAgain from '@/components/PlayAgain.vue'
export default {
  name: 'Kekka',
  data() {
    return {
      openPlayAgain: false,
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
    
	},
	mounted() {
    
	},
  
}
</script>

<style lang="scss">
  @import "../assets/css/kekka.scss"; 
</style>