<template>
	<div id="app">
		<div class="l-inner">
      <div class="loading">
				<div class="loading__contet">
					<div class="loading__photo"><img src="./assets/images/img_dwarf.png" alt="logo"></div>
					<k-progress type="line" :percent="speed" :flow-second="10" :show-text="false" color="#d28bff" bg-color="#fff" :line-height="14"></k-progress>

				<p class="loading__txt">LOADING...</p>
				</div>
      </div>
			<div id="nav">
				<!-- <div @click="changePage('/about')">Home</div> -->
				<!-- <router-link to="/about">About</router-link> -->
			</div>
			<router-view />
		</div>
	</div>
</template>

<script>
import $ from 'jquery'

export default {
	data() {
		return {
		};
	},
	methods: {
	
	},
	mounted() {
		function preload(arrayOfImages) {
			$(arrayOfImages).each(function(){
					// $('<img/>')[0].src = this;
					(new Image()).src = this;
			});
		}	
		
		$(function(){preload(["bg.jpg","bg_light.png","body_01.png","btn_close.png","btn_home.png","btn_light.png","btn_line.png","btn_no.png","btn_ok.png","btn_start.png","btn_tw.png","btn_yes.png","filenames.txt","icon_color01.png","icon_color02.png","icon_color03.png","icon_color04.png","icon_color05.png","icon_color06.png","icon_play.png","icon_tab_01.png","icon_tab_02.png","icon_tab_03.png","icon_tab_04.png","icon_tab_05.png","icon_tab_06.png","icon_tab_07.png","img_bee.png","img_character.png","img_diver.png","img_dwarf.png","img_flour.png","img_heart.png","img_three.png","img_ufo.png","item_01_01_01.png","item_01_01_01_thums.png","item_01_02_01.png","item_01_02_01_thums.png","item_01_03_01.png","item_01_03_01_thums.png","item_01_04_01.png","item_01_04_01_thums.png","item_01_05_01.png","item_01_05_01_thums.png","item_01_06_01.png","item_01_06_01_thums.png","item_02_01_01.png","item_02_01_01_thums.png","item_02_01_02.png","item_02_01_02_thums.png","item_02_01_03.png","item_02_01_03_thums.png","item_02_02_01.png","item_02_02_01_thums.png","item_02_02_02.png","item_02_02_02_thums.png","item_02_02_03.png","item_02_02_03_thums.png","item_02_03_01.png","item_02_03_01_thums.png","item_02_03_02.png","item_02_03_02_thums.png","item_02_03_03.png","item_02_03_03_thums.png","item_02_04_01.png","item_02_04_01_thums.png","item_02_04_02.png","item_02_04_02_thums.png","item_02_04_03.png","item_02_04_03_thums.png","item_02_05_01.png","item_02_05_01_thums.png","item_02_05_02.png","item_02_05_02_thums.png","item_02_05_03.png","item_02_05_03_thums.png","item_02_06_01.png","item_02_06_01_thums.png","item_02_06_02.png","item_02_06_02_thums.png","item_02_06_03.png","item_02_06_03_thums.png","item_03_01_01.png","item_03_01_01_thums.png","item_03_01_02.png","item_03_01_02_thums.png","item_03_01_03.png","item_03_01_03_thums.png","item_03_02_01.png","item_03_02_01_thums.png","item_03_02_02.png","item_03_02_02_thums.png","item_03_02_03.png","item_03_02_03_thums.png","item_03_03_01.png","item_03_03_01_thums.png","item_03_03_02.png","item_03_03_02_thums.png","item_03_03_03.png","item_03_03_03_thums.png","item_03_04_01.png","item_03_04_01_thums.png","item_03_04_02.png","item_03_04_02_thums.png","item_03_04_03.png","item_03_04_03_thums.png","item_03_05_01.png","item_03_05_01_thums.png","item_03_05_02.png","item_03_05_02_thums.png","item_03_05_03.png","item_03_05_03_thums.png","item_03_06_01.png","item_03_06_01_thums.png","item_03_06_02.png","item_03_06_02_thums.png","item_03_06_03.png","item_03_06_03_thums.png","item_04_01_01.png","item_04_01_01_thums.png","item_04_01_02.png","item_04_01_02_thums.png","item_04_01_03.png","item_04_01_03_thums.png","item_04_02_01.png","item_04_02_01_thums.png","item_04_02_02.png","item_04_02_02_thums.png","item_04_02_03.png","item_04_02_03_thums.png","item_04_03_01.png","item_04_03_01_thums.png","item_04_03_02.png","item_04_03_02_thums.png","item_04_03_03.png","item_04_03_03_thums.png","item_04_04_01.png","item_04_04_01_thums.png","item_04_04_02.png","item_04_04_02_thums.png","item_04_04_03.png","item_04_04_03_thums.png","item_04_05_01.png","item_04_05_01_thums.png","item_04_05_02.png","item_04_05_02_thums.png","item_04_05_03.png","item_04_05_03_thums.png","item_04_06_01.png","item_04_06_01_thums.png","item_04_06_02.png","item_04_06_02_thums.png","item_04_06_03.png","item_04_06_03_thums.png","item_05_01_01.png","item_05_01_01_thums.png","item_05_01_02.png","item_05_01_02_thums.png","item_05_01_03.png","item_05_01_03_thums.png","item_05_02_01.png","item_05_02_01_thums.png","item_05_02_02.png","item_05_02_02_thums.png","item_05_02_03.png","item_05_02_03_thums.png","item_05_03_01.png","item_05_03_01_thums.png","item_05_03_02.png","item_05_03_02_thums.png","item_05_03_03.png","item_05_03_03_thums.png","item_05_04_01.png","item_05_04_01_thums.png","item_05_04_02.png","item_05_04_02_thums.png","item_05_04_03.png","item_05_04_03_thums.png","item_05_05_01.png","item_05_05_01_thums.png","item_05_05_02.png","item_05_05_02_thums.png","item_05_05_03.png","item_05_05_03_thums.png","item_05_06_01.png","item_05_06_01_thums.png","item_05_06_02.png","item_05_06_02_thums.png","item_05_06_03.png","item_05_06_03_thums.png","item_06_01_01.png","item_06_01_01_thums.png","item_06_01_02.png","item_06_01_02_thums.png","item_06_01_03.png","item_06_01_03_thums.png","item_06_02_01.png","item_06_02_01_thums.png","item_06_02_02.png","item_06_02_02_thums.png","item_06_02_03.png","item_06_02_03_thums.png","item_06_03_01.png","item_06_03_01_thums.png","item_06_03_02.png","item_06_03_02_thums.png","item_06_03_03.png","item_06_03_03_thums.png","item_06_04_01.png","item_06_04_01_thums.png","item_06_04_02.png","item_06_04_02_thums.png","item_06_04_03.png","item_06_04_03_thums.png","item_06_05_01.png","item_06_05_01_thums.png","item_06_05_02.png","item_06_05_02_thums.png","item_06_05_03.png","item_06_05_03_thums.png","item_06_06_01.png","item_06_06_01_thums.png","item_06_06_02.png","item_06_06_02_thums.png","item_06_06_03.png","item_06_06_03_thums.png","item_07_01_01.png","item_07_01_01_thums.png","item_07_01_02.png","item_07_01_02_thums.png","item_07_01_03.png","item_07_01_03_thums.png","item_07_02_01.png","item_07_02_01_thums.png","item_07_02_02.png","item_07_02_02_thums.png","item_07_02_03.png","item_07_02_03_thums.png","item_07_03_01.png","item_07_03_01_thums.png","item_07_03_02.png","item_07_03_02_thums.png","item_07_03_03.png","item_07_03_03_thums.png","item_07_04_01.png","item_07_04_01_thums.png","item_07_04_02.png","item_07_04_02_thums.png","item_07_04_03.png","item_07_04_03_thums.png","item_07_05_01.png","item_07_05_01_thums.png","item_07_05_02.png","item_07_05_02_thums.png","item_07_05_03.png","item_07_05_03_thums.png","item_07_06_01.png","item_07_06_01_thums.png","item_07_06_02.png","item_07_06_02_thums.png","item_07_06_03.png","item_07_06_03_thums.png","kekka_btn.png","kekka_image_confirm_01.png","kekka_img_item.png","kekla_img_kaisou.png","line_left.png","line_right.png","logo.png","ogp.png","pagetop_btnok.png","pagetop_ttl.png","start.png","x.png"])});
		
	},
	computed: {
		speed() {
			return this.$store.state.speed;
		}
	}
};
</script>

<style lang="scss">
@import "assets/css/style.scss";
</style>
