//import './bootstrap';
import { ref } from 'vue';

import 'flowbite';

//import {getAllTopics2} from './Actions/LearnerActions.js';

import axios from 'axios';
import {createApp} from 'vue';
import App from './App.vue';
import components from "@/components/UI";


import IndexWord from './Word/IndexWords.vue';
import CreateWord from './Word/CreateWord.vue';
import EditWord from './Word/EditWord.vue';

import WordOptions from './Learn/WordOptions.vue';
import EasyStart from './Learn/EasyStart.vue';

import Users from './components/Users.vue';



const app=createApp(App);
components.forEach(component => {app.component (component.name , component)} );
app.mount("#app");





const indexWord=createApp(IndexWord);
components.forEach(component=>{indexWord.component(component.name, component)});
indexWord.mount("#index-word");

const createWord=createApp(CreateWord);
components.forEach(component=>{createWord.component(component.name,component)});
createWord.mount('#create-word');

const editWordApp=createApp({});
editWordApp.component('component-edit-word', EditWord);
components.forEach(component=>{editWordApp.component(component.name,component)});
editWordApp.mount('#edit-word-app');



const easyStart=createApp(EasyStart);
components.forEach(component=>{easyStart.component(component.name,component)});
easyStart.mount('#easy-start');

const wordOptions=createApp(WordOptions);
components.forEach(component=>{wordOptions.component(component.name,component)});
wordOptions.mount('#word-options');

 