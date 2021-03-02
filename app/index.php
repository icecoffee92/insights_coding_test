<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <title>Vue App</title>
  </head>

  <body>

    <div id="app">

      {{ policies }}

      <p v-for="policy in policies">
      </p>
    </div>

    <script>
      const App = new Vue({
        el: '#app',
        data() {
          return {
            errorMsg: false,
            message: 'Hello World!',
            policies: [],
            customer_address: '',
            // currentPolicy: {}
          }
        },
        mounted: function() {
          this.getAllClients(); 
        },
        methods: {
          getAllClients() {
            axios.get("http://localhost:8000/api/policy/read.php").then((response) => {
              this.policies = response.data.policies; 
              console.log(response.data.policies);
            });
          }
        }
      })  
    </script>

  </body>
</html>