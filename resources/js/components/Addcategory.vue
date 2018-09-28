<template>
  
  <form class="form-signin mt-4 bottom-m" v-on:submit.prevent="createCategory">
    <h3>Create your own category and add your own recipe to it.</h3>
    <div class="form-group">
      <label for="add-title">Category</label>
      <input id="add-title" v-model="category.title" class="form-control" placeholder="Category" required autofocus>
      <small class="text-muted">Your category must be unique.</small>
    </div>

    <button type="submit" class="btn btn-xs btn-primary mr-2">Publish Category</button>

    <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>

  </form>
  
</template>

<script>
  export default {
    data() {
      return {
        category: {title: ''},
        duplicate: true
      }
    },

    methods: {
      createCategory() {
        if (!this.duplicate) {
          console.log('YES!');
        }
        axios.post('api/category', this.category)
          .then(response => {
            this.$router.push({ name: 'Navbar' });
            this.flash(`Your category ${this.category.title} has been created.`, 'success');
            this.duplicate = false;
          })
          .catch(err => console.log(err));
      }
    }
  }
</script>