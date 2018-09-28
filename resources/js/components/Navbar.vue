<template>  
  <div>
    
    <flash-message class="myCustomClass"></flash-message>

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
      <div class="col-md-6 px-0">
        <h2 class="display-5 font-italic">Create a cooking category and add your recipe to it...</h2>           
        <router-link role="button" class="btn btn-primary btn-lg" v-bind:to="{path: '/add-recipe'}">
          Create category
        </router-link>

        <h4 class="lead my-3">Or add your recipe to one of the categories below!</h4>
      </div>
    </div>

    <div class="row bottom-m">

      <div v-for="category in categories" class="col-md-6">
        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">Cuisine: {{ category.title }}</strong>
            <h5 class="mb-0">
              <p class="text-dark">Add your recipe to the {{ category.title }} category.</p>
            </h5>
            <div class="mb-1 text-muted">Category created {{ category.created_at }}.</div>
            
            <router-link role="button" class="btn btn-success btn-sx mt-3 mb-4" v-bind:to="{name: 'Addrecipe', params: {id: category.id}}">
              Add your recipe
            </router-link>

            <router-link v-bind:to="{name: 'Listrecipes', params: {id: category.id}}">
              See all the recipes here
            </router-link>
          </div>
        </div>
      </div>

    </div>

  </div>

</template>

<script>
  import VueFlashMessage from 'vue-flash-message';
  import 'vue-flash-message/dist/vue-flash-message.min.css';
  Vue.use(VueFlashMessage);

  export default {
    data() {
      return {
        categories: ''
      };
    },

    created() {
      axios.get('api/categories')
        .then(({data}) => {
          this.categories = data.data;
        })
        .catch(err => console.log(err));
    }
  }
</script>

