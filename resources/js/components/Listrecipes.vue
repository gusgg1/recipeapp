<template>
  <div class="bottom-m">
    <div v-for="recipe in recipes" class="card mt-4 mb-4">
      <h5 class="card-header">{{ recipe.duration }} min.</h5>
      <div class="card-body">
        <h3 class="card-title">{{ recipe.title }}</h3>
        <h5 class="card-subtitle mb-2 text-muted">Ingredients:</h5>
        <p class="card-text">{{ recipe.ingredients }}</p>
        <h5 class="card-subtitle mb-2 text-muted">Preparation:</h5>
        <p class="card-text">{{ recipe.steps }}</p>
        <a role="button" @click="deleteRecipe(recipe.id)" class="btn btn-danger btn-xs mr-2">Delete</a>
        <router-link class="btn btn-warning btn-xs" v-bind:to="{name: 'Editrecipe', params: {id: recipe.id}}">Edit</router-link>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    data() {
      return {
        recipes: []
      }
    },

    // Filtering data by category_id and whether publish or not 
    created() {
      axios.get('/api/recipes')
        .then(({data}) => {
          for (let i = 0; i < data.data.length; i++) {
            if (this.$route.params.id === data.data[i].category_id && data.data[i].publish) {
              this.recipes.push(data.data[i]);
            }
          }

        })
        .catch(err => console.log(err));
    },

    methods: {
      deleteRecipe(id) {
        axios.delete(`/api/recipe/${id}`)
          .then(res => {
            this.$router.push({ name: 'Navbar' });
          })
          .catch(err => console.log(err));
      }
    }

  }
</script>
