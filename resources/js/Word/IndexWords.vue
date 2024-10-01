<template>
  <div>

  <btn-create @click="directToCreteForm" :class="{'ml-4':true}" >Create</btn-create>
  <pagination-pages
      :totalPages="lastPage" :currentPage="currentPage" @pagechanged="onPageChange" />

  <table-index-header>
          <table-index-row  v-for="word in words" :item="word" :key="word.id"
                            @showEditForm="showEditForm"
                            @showModalDelete="showModalDelete"   >

            <tag-topic v-for="topic in word.topics" >
                {{topic.name}}
            </tag-topic>

          </table-index-row>
  </table-index-header>

  <modal-delete v-model:show="isOpen" @confirmDelete="confirmDelete"   />
  <message-success :flashMessage="flashMessage" :showMessage="showMessage"/>

  </div>
</template>

<script>
import axios from 'axios';

export default {


  data() {
    return {
      words:[],
      isOpen:false,
      wordIdToDelete:'',
      showMessage:false,
      flashMessage:'',
      currentPage:'',
      lastPage:'',
      links:[],
      mainLinks:[],

    }
  },


  methods: {
    showMessageSuccess(){
      this.showMessage=true
      setTimeout(() => {
        this.showMessage = false
      }, 2000)
    },


    async fetchWords(url) {

      console.log(url)

      try {
          const responce=await axios.get(url)
          this.words=responce.data.data
          this.currentPage=responce.data.meta.current_page
          this.lastPage=responce.data.meta.last_page

      }
      catch(e){
        alert("Ошибка")
      }

    },
    directToCreteForm(){
      window.location.href = 'https://gid-pro.ru/vue/words/create'
    },
    showEditForm(id) {
      console.log("click")
      window.location.href='https://gid-pro.ru/vue/words/' +id +'/edit'
    },

    showModalDelete(wordIdToDelete){

       this.isOpen=true;
       this.wordIdToDelete=wordIdToDelete
    },

    confirmDelete(confirmation){

      if(confirmation) {
        this.fetchDeleteWord()
        this.words=this.words.filter(p=>p.id!==this.wordIdToDelete)
       }

    },

    async fetchDeleteWord() {

      try {
        const responce = axios.delete('https://prs3.ru/api/v2/words/'+ this.wordIdToDelete)
        console.log('Удалено Успешно')
        this.showMessageSuccess()
        this.flashMessage="Word has been deleted"
      }
      catch (e) {
        alert('Ошибка удаления данных')

      }

    },

    onPageChange(page) {

      this.currentPage = page;
      let urlPage='https://prs3.ru/api/v2/words?page='+ this.currentPage
      this.fetchWords(urlPage)
    }

  },
  mounted() {

    let startUrl ='https://prs3.ru/api/v2/words'
    this.fetchWords(startUrl)
  }

}
</script>
 