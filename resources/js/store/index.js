import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import Account from './modules/account'

export const store = new Vuex.Store({
  modules: {
    Account
  }
})