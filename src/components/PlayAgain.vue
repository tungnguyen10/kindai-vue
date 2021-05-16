<template>
	<div class="box-play">
		<h2 class="ttl-share">{{titleshare}}</h2>
		<div class="btn btn-more"><img :src="require('../assets/images/' + imgPlay + '.png')" :alt="alt" /></div>
	</div>
</template>

<script>
export default {
	name: "Sharebottom",
	props: {
		titleshare: String,
		imgPlay: String,
		alt: String,
	},
};
</script>

<style lang="scss">
@import "../assets/css/layout/_share_bottom.scss";
</style>


