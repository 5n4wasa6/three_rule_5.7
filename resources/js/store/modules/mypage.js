
const state = {
    mypage: [],
    authenticated: false,
  }
  
  const actions = {
    async getMypage({ commit }, payload) {
      const res = await axios.get('club/'+ payload.club_id +'/mypage/'+ payload.user_id, payload)
      console.log(res.data)
      commit('setMypage', res.data)
    }
  };
  
  const mutations = {
    setMypage(state, payload) {
      Object.assign(state, { mypage: payload })
    }
  };
  
  const getters = {
     mypage: (state, getters, rootState) => state.mypage.data,
  };
  
  export default {
      namespaced: true,
      state,
      mutations,
      getters,
      actions
  };