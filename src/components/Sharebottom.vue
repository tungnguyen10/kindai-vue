<template>
	<div class="share_bottom">
		<h2 class="ttl-share">{{titleshare}}</h2>
		<div class="share_bottom__content">
			<p class="left"><img :src="require('../assets/images/' + img1_share + '.png')" alt="photo" /></p>
			<ul>
				<li>
					<a href="#"><img src="../assets/images/btn_tw.png" alt="twitter"/></a>
				</li>
				<li>
					<a href="#"><img src="../assets/images/btn_line.png" alt="line"/></a>
				</li>
			</ul>
			<p class="right"><img :src="require('../assets/images/' + img2_share + '.png')" alt="photo" /></p>
		</div>
	</div>
</template>

<script>
export default {
	name: "Sharebottom",
	props: {
		titleshare: String,
		img1_share: String,
		img2_share: String,
	},
};
</script>

<style lang="scss">
@import "../assets/css/layout/_share_bottom.scss";
</style>

<!-- Add "scoped" attribute to limit CSS to this component only -->

<style scoped>
</style>
