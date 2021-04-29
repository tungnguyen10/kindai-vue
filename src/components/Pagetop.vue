<template>
  <div class="l-page-top">
    <div class="l-page-top__first">
      <h2><img src="../assets/images/pagetop_ttl.png" alt="Redfish×近畿大学農学部 my Nogaku Styles"></h2>
      <p class="txt">自分だけのオリジナルコーディネートで農学を着こなそう！<br>選んだアイテムからあなたにぴったりの学科が見つかるかも？！</p>
    </div>
    <div class="l-page-top__content">
      <p class="photo"><img src="../assets/images/img_character.png" alt="photo"></p>
      <div class="btn-pink btn_start" @click="openModal('modal-01')"><img src="../assets/images/start.png" alt="start"></div>

    </div>
    <div class="popup">
      <div class="popup__content" id="modal-01">
        <h2>利用規約</h2>
        <div class="popup__content_box">
           <p class="txt">このコンテンツを利用する前に<br>利用規約に同意していただく必要があります。</p>
          <div class="check_policy_box">
            <input type="checkbox" v-model="policy_check" id="check_policy">
            <label for="check_policy" :class="[policy_check ? 'active' : 'inactive']"><a @click="openModal('modal-02')">利用規約</a> に同意します</label>
           
          </div>
           <div class="btn-pink btn_ok" :class="[policy_check ? 'inactive' : 'active']" @click="closeModal(),changePage('/tutorial')"><img src="../assets/images/btn_ok.png" alt="ok"></div>
        </div>

      </div>
      <div class="popup__content" id="modal-02">
        <h2>利用規約</h2>
        <div class="popup__content_box1">
           <div class="txt_policy">
             <dl>
                <dt>第１条　はじめに</dt>
                <dd>・この利用規約（以下、「本規約」といいいます）は、株式会社テトラクローマ（以下、「当社」といいいます）が提供する本サービス（第２条において定義します）の利用条件を定めるものです。ユーザーの皆さま（以下、「ユーザー」といいます）には、本規約に従って、本サービスをご利用いただきます。</dd>
                <dd>・ユーザーは、本サービスを利用することにより、本規約の全ての記載内容について同意したものとみなされます。</dd>
             </dl>
             <dl>
                <dt>第２条　定義</dt>
                <dd>・「本サービス」とは、「Picrew」および「Picrew」に関するサービスをいいます。</dd>
                <dd>・「ユーザー」とは、会員登録の有無に関わらず、本サービスを利用する者の総称です。</dd>
                <dd>「登録ユーザー」とは、第３条に基づき、本サービスへの利用登録を行ったユーザーのことをいいます。</dd>
                <dd>・「クリエイター」とは、第３条に基づき、「Picrewクリエイター」への利用登録を行ったユーザーのことをいいます。</dd>
                <dd>・「登録メールアドレス」とは、登録ユーザーがアカウント情報として登録したメールアドレスのことをいいます。</dd>
                <dd>・「本件素材」とは、クリエイターが、本サービスに提供した素材をいいます。</dd>
                <dd>・「本件画像」とは、ユーザーが、本件素材を組み合わせて作成した画像をいいます。</dd>
             </dl>
             <dl>
                <dt>第３条　利用登録</dt>
                <dd>・本サービスの利用を希望する者は、本規約に同意の上、当社所定の方法により、登録の申請を行うものとします。</dd>
                <dd>・当社は、利用登録の申請者に以下の事由があると判断した場合、利用登録の申請を承認しないことがあります。また、その理由については一切の開示義務を負わないものとします。</dd>
                <dd>第1項の方法によらずに、登録の申請を行った場合。<br>本規約に違反したことがある者からの申請である場合<br>
                その他、当社が利用登録を相当でないと判断した場合<br>第４条　アカウント情報の管理<br>本サービスは、登録メールアドレスをユーザーIDとして利用します。<br>登録ユーザーは、自分の管理に属する使用可能なメールアドレスを登録メールアドレスとして登録するものとします。登録メールアドレスが、自己の管理に属さなくなった場合、すみやかに自分の管理に属する使用可能なメールアドレスに変更するものとします。<br>ユーザーは、自己の責任において、本サービスのユーザーIDおよびパスワードを管理するものとします。<br>ユーザーは、いかなる場合にも、ユーザーIDおよびパスワードを第三者に譲渡または貸与することはできません。<br>当社は、ユーザーIDとパスワードの組み合わせが登録情報と一致してログインされた場合には、そのユーザーIDを登録しているユーザー自身による利用とみなし、一切の責任を負わないものとします。
                </dd>
             </dl>
            </div>
         
           <div class="btn-pink btn_ok" @click="closeModal(),changePage('/tutorial')"><img src="../assets/images/btn_ok.png" alt="ok"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
import { globalFuncs } from '../main.js'
export default {
  
  name: 'Pagetop',
  data() {
    return {
      policy_check: false,
    }
  },
  methods: {
		changePage: function (i) {
			globalFuncs.nextPage(i);
		}, 
    openModal: function(id){
      globalFuncs.openModal(id);
    },
    closeModal: function(){
      globalFuncs.closeModal();
    },

	},
	mounted() {
		$(".photo").scrollLeft(($(".photo img").width() - $(window).width()) / 2);
    $(".popup").click(function () {
      if(!$(event.target).closest('.popup .popup__content').length ) {
        globalFuncs.closeModal();
      }
    });
	},
  
}
</script>

<style lang="scss">
  @import "../assets/css/page_top.scss";
</style>

<!-- Add "scoped" attribute to limit CSS to this component only -->

<style scoped>

</style>
