import Vue from 'vue'
import './bootstrap'
import './dom-work'

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key =>
  Vue.component(
    key
      .split('/')
      .pop()
      .split('.')[0],
    files(key).default
  )
)

const app = new Vue({}).$mount('#app')
