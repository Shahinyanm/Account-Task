import http from '@/setup/http'

const state = {
  accounts: [],
}

const getters = {
  /**
   * Get All Accounts
   * @param state
   * @returns {*}
   * @constructor
   */
  ACCOUNTS (state) {
    return state.accounts
  },
}

const mutations = {
  /**
   * Set Accounts
   * @param state
   * @param payload
   * @constructor
   */
  SET_ACCOUNTS: (state, payload) => {
    state.accounts = payload
  },
  /**
   * Push To Accounts
   * @param state
   * @param payload
   * @constructor
   */
  PUSH_TO_ACCOUNTS: (state, payload) => {
    state.accounts.push(payload)
  },
}

const actions = {
  /**
   * Get Components
   * @param commit
   * @returns {Promise<void>}
   * @constructor
   */
  GET_ACCOUNTS: async ({ commit }) => {
    const { data } = await http.get('/accounts')
    commit('SET_ACCOUNTS', data.data)
  },
  /**
   * Create Account
   * @param commit
   * @param payload
   * @returns {Promise<void>}
   * @constructor
   */
  CREATE_ACCOUNT: async ({ commit }, payload) => {
    const { data } = await http.post('/accounts', payload, {
      headers: {
        'Content-Type': 'multipart/form-data',
      },
    })
    commit('PUSH_TO_ACCOUNTS', data.data)

    return data
  },
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions,
}