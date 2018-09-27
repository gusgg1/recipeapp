<template>  
  <div class="container">
    <!-- <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="#">My Recipe App</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="text-muted" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
          </a>
        </div>
      </div>
    </header> -->

    <!-- <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="#">Mediterranean diet</a>
        <a class="p-2 text-muted" href="#">Cooking</a>
        <a class="p-2 text-muted" href="#">Ketogenic diet</a>
      </nav>
    </div> -->

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
      <div class="col-md-6 px-0">
        <h2 class="display-5 font-italic">Create a cooking category and add your recipe to it...</h2>           

        <router-link role="button" class="btn btn-primary btn-lg active" v-bind:to="{path: '/add-recipe'}">
          Create category
        </router-link>

        <h4 class="lead my-3">Or add your recipe to one of the categories below!</h4>
      </div>
    </div>

    <div class="row mb-2">

      
      <div v-for="category in categories" class="col-md-6">
        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">Cousine: {{ category.title }}</strong>
            <h5 class="mb-0">
              <p class="text-dark">Add your recipe to the {{ category.title }} category.</p>
            </h5>
            <div class="mb-1 text-muted">{{ category.created_at }}</div>
            
            <router-link role="button" class="btn btn-success btn-sx mt-3 mb-4" v-bind:to="{name: 'Addrecipe', params: {id: category.id}}">
              Add your recipe
            </router-link>

            <router-link v-bind:to="{name: 'Listrecipes', params: {id: category.id}}">
              See all the recipes here
            </router-link>
          </div>
        </div>
      </div>

      <!-- <footer class="blog-footer">
        <p>&copy; My Recipe App - 2018</p>
        <p>
          <a href="#">Back to top</a>
        </p>
      </footer> -->

    </div>

    <footer class="blog-footer">
      <p>&copy; My Recipe App - 2018</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

  </div>

</template>

<script>
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

