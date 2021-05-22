<template>
	<div class="share_bottom">
		<h2 class="ttl-share">{{titleshare}}</h2>
		<div class="share_bottom__content">
			<p class="left"><img :src="require('../assets/images/' + img1_share + '.png')" alt="photo" /></p>
			<ul>
				<li>
					<a class="twt" :href="'https://twitter.com/share?text=%E3%82%A2%E3%82%A4%E3%83%86%E3%83%A0%E3%82%92%E8%87%AA%E7%94%B1%E3%81%AB%E7%B5%84%E3%81%BF%E5%90%88%E3%82%8F%E3%81%9B%E3%81%A6%E8%87%AA%E5%88%86%E3%81%A0%E3%81%91%E3%81%AE%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E7%94%BB%E5%83%8F%E3%82%92%E4%BD%9C%E3%82%8D%E3%81%86%EF%BC%81%E3%81%88%E3%82%89%E3%82%93%E3%81%A0%E3%82%A2%E3%82%A4%E3%83%86%E3%83%A0%E3%81%8B%E3%82%89%E3%81%82%E3%81%AA%E3%81%9F%E3%81%AE%E8%BE%B2%E5%AD%A6%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E3%82%92%E8%A8%BA%E6%96%AD%E3%81%99%E3%82%8B%E3%82%88%EF%BC%81%0D%0A&url=' + share_url" data-lang="ja" data-count="none" onclick="window.open(this.href,'tweetwindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!'); return false;"><img src="../assets/images/btn_tw.png" alt="twitter"/></a>
				</li>
				<li>
				<a class="line" :href="'http://line.me/R/msg/text/?%E3%82%A2%E3%82%A4%E3%83%86%E3%83%A0%E3%82%92%E8%87%AA%E7%94%B1%E3%81%AB%E7%B5%84%E3%81%BF%E5%90%88%E3%82%8F%E3%81%9B%E3%81%A6%E8%87%AA%E5%88%86%E3%81%A0%E3%81%91%E3%81%AE%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E7%94%BB%E5%83%8F%E3%82%92%E4%BD%9C%E3%82%8D%E3%81%86%EF%BC%81%E3%81%88%E3%82%89%E3%82%93%E3%81%A0%E3%82%A2%E3%82%A4%E3%83%86%E3%83%A0%E3%81%8B%E3%82%89%E3%81%82%E3%81%AA%E3%81%9F%E3%81%AE%E8%BE%B2%E5%AD%A6%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E3%82%92%E8%A8%BA%E6%96%AD%E3%81%99%E3%82%8B%E3%82%88%EF%BC%81%0D%0A' + share_url" onclick="window.open(this.href, 'LINEwindow', 'width=650, height=490, menubar=no, toolbar=no, scrollbars=yes'); return false;"><img src="../assets/images/btn_line.png" alt="line"/></a>
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
		share_url: String,
	},
};
</script>

<style lang="scss">
@import "../assets/css/layout/_share_bottom.scss";
</style>

<!-- Add "scoped" attribute to limit CSS to this component only -->

<style scoped>
</style>
