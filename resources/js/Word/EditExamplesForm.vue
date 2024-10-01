<template>
  <div>


    <btn-create @click="showCreateForm">Create</btn-create>



    <table-index-header>

      <table-examples-row v-for="example in examples" :item="example" :key="example.id"
                          @showEditForm="showEditForm"
                          @showModalDelete="showModalDelete"

      />

    </table-index-header>

    <modal-create-word-example
        v-model:showCreateExample="showCreateExample"
        :id="id"
        @showSpiner="showSpiner"
        @showMessage="showMessage"
        @newExample="newExample"

    />


    <modal-delete v-model:show="isOpen" @confirmDelete="confirmDelete"   />



  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'edit-examples-form',

  data() {
    return {
      showCreateExample:false,

      examples:[],

      isOpen:false,
      exampleIdToDelete:'',




    }
  },

  props: {
    id:{type:Number,required:true}
  },

  methods: {


    showCreateForm() {
        this.showCreateExample=true
    },

    async fetchExamples() {

      try {
         
        const responce = await axios.get('https://prs3.ru/api/v2/examples-word-id/' + this.id)
        this.examples=responce.data


      }
      catch(e){
        alert('Could not load Examples of this word')
      }

    },

    newExample(newExample){
      this.examples.unshift(newExample)
    },


    showModalDelete(exampleIdToDelete){
     this.isOpen=true;
     this.exampleIdToDelete=exampleIdToDelete

    },


    confirmDelete(confirmation){
      if(confirmation) {
        this.fetchDeleteExample()
        this.examples=this.examples.filter(p=>p.id!==this.exampleIdToDelete)

      }
    },
    async fetchDeleteExample(){
      try {
        this.$emit('showSpiner',true)
        const responce=await axios.delete('https://prs3.ru/api/v2/examples/' +this.exampleIdToDelete)
        this.$emit('showSpiner', false)
        this.$emit('showMessage','Deleted')
      }
      catch(e){
        this.$emit('showSpiner',false)
        alert("Could not delete Example")
      }
    },


    showSpiner(spinerTag){
        this.$emit('showSpiner',spinerTag)
    },
    showMessage(message){

      this.$emit('showMessage',message)
      console.log('edit example form' + message)

    }



  },


  mounted(){

    this.fetchExamples()

  }



}
</script>
