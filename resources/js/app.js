import './bootstrap';


import { createApp } from "vue/dist/vue.esm-bundler.js" ;
import MessageComponent from './components/MessageComponent.vue' ;

const app = createApp({}) ;

app.component('message-component' , MessageComponent ) ;

app.mount('#app') ;
