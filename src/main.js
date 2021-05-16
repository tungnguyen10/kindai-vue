import Vue from 'vue'
import App from './App.vue'
import router from './router'
import KProgress from 'k-progress'
import $ from 'jquery'
import store from "./store"

Vue.component('k-progress', KProgress);
Vue.config.productionTip = false

window.axios = require('axios');

export var globalFuncs = {
  nextPage: function (i) {
    $('.loading').addClass('active');
    store.commit('changeSpeed', 0);
    var ii = 5;
    var tt = setInterval(function(){ 
      store.commit('changeSpeed', ii);
      if ( ii == 100 ) {
        clearInterval(tt);
        router.push(i).catch(() => {});
        $('.loading').removeClass('active');
      }
      ii++;
    }, 20);
  },
  openModal: function(id){
    $(".popup__content").removeClass('open-modal');
    $("#" + id).toggleClass('open-modal');
    if($(".popup__content.open-modal").length > 0){
      $("#" + id).parent().addClass('open-modal');
    }else{
      $("#" + id).parent().removeClass('open-modal');
    }
  },
  closeModal: function(){
    $(".popup").removeClass('open-modal');
    $(".popup__content").removeClass('open-modal');
  }
  
}

new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app')
