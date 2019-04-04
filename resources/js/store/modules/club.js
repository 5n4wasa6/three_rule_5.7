
const state = {
    clubData: [],
    selectClubData: [],
    userData: [],
    authenticated: false,
  }
  
  const actions = {
    async getClub({ commit }, payload) {
      const res = await axios.get('/club/'+ payload.club_id + '/user/' + payload.user_id, payload)
      commit('setClub', res.data)
    },
    async selectClub({ commit }, payload) {
      const res = await axios.get('/selectclub', payload)
      commit('selectClub', res.data)
    },
    async getUser({ commit }, payload) {
      const res = await axios.get('/getUser', payload)
      commit('getUser', res.data)
    }
  };
  
  const mutations = {
    setClub(state, payload) {
      Object.assign(state, { clubData: payload })
    },
    selectClub(state, payload) {
      Object.assign(state, { selectClubData: payload })
    },
    getUser(state, payload) {
      Object.assign(state, { userData: payload })
    }
  };
  
  const getters = {
    clubData: (state, getters, rootState) => state.clubData.data,
    
    selectClubData: (state, getters, rootState) => state.selectClubData.data,
    
    userData: (state, getters, rootState) => state.userData.data
  };
  
  export default {
      namespaced: true,
      state,
      mutations,
      getters,
      actions
  };