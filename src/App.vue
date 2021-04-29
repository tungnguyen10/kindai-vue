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
// import $ from 'jquery'

export default {
	data() {
		return {
		};
	},
	methods: {
	
	},
	mounted() {
		
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
