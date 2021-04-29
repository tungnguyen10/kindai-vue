import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    speed: 0,
  },
  getters: {},
  mutations: {
    changeSpeed(state, i) {
      state.speed = i;
    }
  },
  actions: {}
});