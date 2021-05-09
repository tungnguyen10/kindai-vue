<template>
  <div class="tutorial">
    <img src="../assets/images/tutorial.png" alt="">
    
      <p class="btn-show-step" @click="step=1"></p>
    <div class="popup" v-show="step <= 5">
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
          <dt>完成したら<br> SNSでシェアしてね</dt>
          <dd>※選んでいないカテゴリがあると<br>完成ボタンは出てこないよ</dd>
        </dl>
      </div>
      <p class="btn-next-step" @click="step++"></p>
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
import { globalFuncs } from '../main.js'
export default {
  
  name: 'Tutorial',
  data() {
    return {
      step: 1,
    }
  },
  methods: {
		

	},
	mounted() {
		
	},
  
}
</script>

<style lang="scss">
  @import "../assets/css/tutorial.scss";
</style>