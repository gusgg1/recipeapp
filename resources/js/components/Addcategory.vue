<template>
  <div class="container">

    <form class="form-signin mt-4" v-on:submit.prevent="createCategory">
      <h3>Create your own category and add your own recipe to it.</h3>
      <div class="form-group">
        <label for="add-title">Category</label>
        <input id="add-title" v-model="category.title" class="form-control" placeholder="Category" required autofocus>
      </div>

      <button type="submit" class="btn btn-xs btn-primary">Publish Category</button>

      <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>

    </form>
  
  </div>
</template>

<script>
  export default {
    data() {
      return {
        // category: {title: '', category_id: ''}
        category: {title: ''}
      }
    },

    methods: {
      createCategory() {
        axios.post('api/category', this.category)
          .then(response => {
            this.$router.push({ name: 'Navbar' });
          })
          .catch(err => console.log(err));
      }
    }
  }
</script>