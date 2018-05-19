import './bootstrap';
import Vue from 'Vue';
import ExampleComponent from './components/ExampleComponent';

Vue.component('example-component', ExampleComponent);

const app = new Vue({}).$mount('#app');
