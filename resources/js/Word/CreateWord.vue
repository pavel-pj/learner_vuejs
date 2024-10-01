<template>
  <div id="create-word">
    <div class="rounded-2xl bg-white  w-full     md:w-5/12 px-4 py-8 md:p-8 mx-auto"  >
      <div class="text-stone-700 font-bold text-2xl">Create new word</div>

      <form  @submit.prevent >
        <input-text v-model:value="word" :name="wordName" />
        <multiselect v-model="value"
                     tag-placeholder="Add this as new tag"
                     placeholder="Search or add a tag"
                     label="name"
                     track-by="id"
                     :options="options"
                     :multiple="true" :taggable="true" @tag="addTag"></multiselect>


         <input-text v-model:value="translation_ru" :name="translationRu" />
         <input-text v-model:value="translation_en" :name="translationEn" />
         <btn-create @click="createPost" >Create</btn-create>

      </form>
    </div>


    <message-success :flashMessage="flashMessage" :showMessage="showMessage"/>
    <main-spiner :showSpiner="showSpiner"/>
  </div>

</template>


<script>
import axios from 'axios';
import Multiselect from 'vue-multiselect';


export default {
  components: { Multiselect },

  data(){
    return {
      value: [],
      options:[],

      word:'',
      translation_en:'',
      translation_ru:'',

      wordName:'word',
      translationEn:'English translation',
      translationRu:'translation',

      showMessage:false,
      flashMessage:'',

      showSpiner:false

    }
  },
  methods :{

    test1(){
      console.log(this.value)

    },

    showMessageSuccess(){
      this.showMessage=true
      setTimeout(() => {
        this.showMessage = false
      }, 2000)
    },

    addTag (newTag) {
      const tag = {
        name: newTag,
        //id: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
      }
      this.options.push(tag)
      this.value.push(tag)

    },


    createPost(){

      this.showSpiner=true
      this.postRequesteCreate()

    },

   async getAllTopics(){

      try{
        const urlTopics='https://prs3.ru/api/v2/topics';
        const responce= await axios.get(urlTopics)
        this.options=responce.data
      }
      catch(e){
        alert("Could not load Topics")
      }

    },


    async postRequesteCreate() {
      try {
        const responce=await axios.post('https://prs3.ru/api/v2/words',{
          word:this.word,
          translation_en:this.translation_en,
          translation_ru:this.translation_ru
        })




        let word_id=responce.data.id
        let topics=[]
        this.value.forEach((item) => {
          topics.push(item.id)
        });

        //console.log(topics)

        try {
          const responce = await axios.post('https://prs3.ru/api/v2/topicword', {word_id:word_id, topics:topics});

          //console.log(responce)

            window.location.href='https://gid-pro.ru/vue/words/' + word_id +'/edit'
        }
        catch(e){
           alert("Could not add topics")
          this.showSpiner=false
        }

      }
      catch(e){
        alert("Could not add Word")
        this.showSpiner=false
      }
    },

  },
  mounted() {
    this.getAllTopics();

  }


}
</script>
