<template>
  <div class="container mb-4">

    <form class="form-signin mt-4" v-on:submit.prevent="updateRecipe">
      <h3>Add your recipe</h3>
      <div class="form-group">
        <label for="add-title">Title:</label>
        <input id="add-title" v-model="recipe.title" class="form-control" placeholder="Title" required autofocus>
      </div>

      <div class="form-group">
        <label for="add-ingredients">Ingredients:</label>
        <textarea id="add-ingredients" v-model="recipe.ingredients" cols="15" rows="5" class="form-control" required placeholder="List of ingredients..."></textarea>
      </div>

      <div class="form-group">
        <label for="add-steps">Steps:</label>
        <textarea id="add-steps" v-model="recipe.steps" cols="15" rows="5" class="form-control" placeholder="Steps for preparation..." required></textarea>
      </div>

      <div class="form-group">
        <label for="add-duration">Duration:</label>
        <input id="add-duration" v-model="recipe.duration" class="form-control" placeholder="Type minutes" maxlength="3" required>
      </div>

      <div class="custom-control custom-checkbox mb-3">
        <input type="checkbox" class="custom-control-input" id="customCheck1" v-model="recipe.publish">
        <label class="custom-control-label" for="customCheck1">Would you like to publish your recipe?</label>
      </div>

      <button type="submit" class="btn btn-xs btn-primary mr-3">Publish Recipe</button>

      <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>

    </form>

  </div>
</template>

<script>
  export default {
    data() {
      return {
        recipe: ''
      }
    },

    created() {
      axios.get(`/recipes/${this.$route.params.id}/edit`)
        .then(({data}) => {
          this.recipe = data;
        })
        .catch(err => console.log(err));
    },

    methods: {
      updateRecipe() {
        axios.put('/api/recipe', this.recipe)
          .then(response => {
            this.$router.push({ name: 'Navbar' });
          })
          .catch(err => console.log(err));
      }
    }
  }
</script>