<template>
  <div :class="[openPlayAgain == true ? 'active':''  ,'kekka']">
    <p class="btn-home" @click="openPlayAgain=true"><img src="../assets/images/btn_home.png" alt=""></p>
    <p class="btn-home right" @click='light = !light'><img src="../assets/images/btn_light.png" alt=""></p>
    <p :class="['confirm-img', light == true? 'active':'']" ><img src="../assets/images/kekka_image_confirm_01.png" alt=""></p>
    <p class="save">長押しで画像保存しよう！</p>
    <Sharebottom titleshare="今すぐコーデをシェアしよう" img1_share="img_heart" img2_share="img_bee"/>
    
    <div class="content_present">
      <h2 class="ttl">近大学科ファッション％</h2>
      <div class="box">
        <dl>
          <dt>農業生産科学科</dt>
          <dd><div class="present_item"><k-progress type="line" :percent="100" :show-text="true" color="#ffb607" :line-height="18"></k-progress></div></dd>
        </dl>
        <dl>
          <dt>水産学科</dt>
          <dd><div class="present_item"><k-progress type="line" :percent="50" :show-text="true" color="#29a7ff" :line-height="18"></k-progress></div></dd>
        </dl>
        <dl>
          <dt>応用生命化学科</dt>
          <dd><div class="present_item"><k-progress type="line" :percent="100" :show-text="true" color="#ffec4c" :line-height="18"></k-progress></div></dd>
        </dl>
        <dl>
          <dt>食品栄養学科</dt>
          <dd><div class="present_item"><k-progress type="line" :percent="100" :show-text="true" color="#f986c4" :line-height="18"></k-progress></div></dd>
        </dl>
        <dl>
          <dt>環境管理学科</dt>
          <dd><div class="present_item"><k-progress type="line" :percent="100" :show-text="true" color="#63e2d5" :line-height="18"></k-progress></div></dd>
        </dl>
        <dl>
          <dt>生物機能科学科</dt>
          <dd><div class="present_item"><k-progress type="line" :percent="100" :show-text="true" color="#ff674e" :line-height="18"></k-progress></div></dd>
        </dl>
      </div>
      <div class="box">
        <dl class="txt">
          <dt>あなたのコーディネート結果は</dt>
          <dd><span>農業生産科学科</span>でした！</dd>
          </dl>
      </div>
      <p class="note">※この結果は実際の学科を決定するものではありません。</p>
    </div>
    <div class="content_colection">
      <h2 class="ttl">アイテム紹介</h2>
      <div class="box-items">
        <div class="item">
          <h3>KINDAIマグロバッグ</h3>
          <div class="item-box">
            <div class="item-box__left"><img src="../assets/images/kekka_img_item.png" alt=""></div>
            <div class="item-box__right">
              <h4>世界初！<br>クロマグロの完全養殖実現！</h4>
              <p class="des">近大農学部水産学科が世界で初めてクロマグロの完全養殖に成功したことを記念した限定バッグ。</p>
              <div class="btn btn-more"><p>詳しく見る</p></div>
            </div>
          </div>
        </div>
        <div class="item">
          <h3>KINDAIマグロバッグ</h3>
          <div class="item-box">
            <div class="item-box__left"><img src="../assets/images/kekka_img_item.png" alt=""></div>
            <div class="item-box__right">
              <h4>世界初！<br>クロマグロの完全養殖実現！</h4>
              <p class="des">近大農学部水産学科が世界で初めてクロマグロの完全養殖に成功したことを記念した限定バッグ。</p>
              <div class="btn btn-more"><p>詳しく見る</p></div>
            </div>
          </div>
        </div>
        <div class="item">
          <h3>KINDAIマグロバッグ</h3>
          <div class="item-box">
            <div class="item-box__left"><img src="../assets/images/kekka_img_item.png" alt=""></div>
            <div class="item-box__right">
              <h4>世界初！<br>クロマグロの完全養殖実現！</h4>
              <p class="des">近大農学部水産学科が世界で初めてクロマグロの完全養殖に成功したことを記念した限定バッグ。</p>
              <div class="btn btn-more"><p>詳しく見る</p></div>
            </div>
          </div>
        </div>
        <div class="item">
          <h3>KINDAIマグロバッグ</h3>
          <div class="item-box">
            <div class="item-box__left"><img src="../assets/images/kekka_img_item.png" alt=""></div>
            <div class="item-box__right">
              <h4>世界初！<br>クロマグロの完全養殖実現！</h4>
              <p class="des">近大農学部水産学科が世界で初めてクロマグロの完全養殖に成功したことを記念した限定バッグ。</p>
              <div class="btn btn-more"><p>詳しく見る</p></div>
            </div>
          </div>
        </div>
        <div class="item">
          <h3>KINDAIマグロバッグ</h3>
          <div class="item-box">
            <div class="item-box__left"><img src="../assets/images/kekka_img_item.png" alt=""></div>
            <div class="item-box__right">
              <h4>世界初！<br>クロマグロの完全養殖実現！</h4>
              <p class="des">近大農学部水産学科が世界で初めてクロマグロの完全養殖に成功したことを記念した限定バッグ。</p>
              <div class="btn btn-more"><p>詳しく見る</p></div>
            </div>
          </div>
        </div>
        <div class="item">
          <h3>KINDAIマグロバッグ</h3>
          <div class="item-box">
            <div class="item-box__left"><img src="../assets/images/kekka_img_item.png" alt=""></div>
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
      light: true,
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
    $(".content_present .k-progress-text").each(function() {
      var t = $(this);
      t.parent().find('.k-progress-outer-line').append(t);
    })
	},
  
}
</script>

<style lang="scss">
  @import "../assets/css/kekka.scss"; 
</style>