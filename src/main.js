import Vue from 'vue'
import App from './App.vue'
import router from './router'
import KProgress from 'k-progress'
import $ from 'jquery'
import store from "./store"

Vue.component('k-progress', KProgress);
Vue.config.productionTip = false

const axios = require('axios');
// window.axios = require('axios');

export var globalFuncs = {
  scrollpos: $(window).scrollTop(),
  idApi: '',
  baseUrl: window.location.origin,
  first_time_open: true,
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
        window.scrollTo(0, 0);
      }
      ii++;
    }, 20);
  },
  openModal: function(id){
    $(".popup__content").removeClass('open-modal');
    $("#" + id).toggleClass('open-modal');
    this.scrollpos = $(window).scrollTop();
    $('body').addClass('freezePage').css({ 'top': -this.scrollpos });
    if ($(".popup__content.open-modal").length > 0){
      $("#" + id).parent().addClass('open-modal');
    } else {
      $("#" + id).parent().removeClass('open-modal');
    }
  },
  closeModal: function(){
    $(".popup").removeClass('open-modal');
    $(".popup__content").removeClass('open-modal');
    $('body').removeClass('freezePage').css({ 'top': 0 });
    $('.play-again').removeClass('open-modal');
    window.scrollTo(0, this.scrollpos);
  }
  
}

new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app')
