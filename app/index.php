<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Vue App</title>
  </head>

  <body>
    <div class="container">
      <div role="main" class="container">
        <h1 class="mb-3">Policies</h1>
        <div id="app" class="col-md-8">
          <client-list></client-list>
        </div>
      </div>
    </div>

    <script>

      Vue.component('client-list', {
        template:`
          <table class="table">
            <thead>
              <tr> 
                <th>Client Name</th>
                <th>Customer Address</th>
                <th>Customer Name</th>
                <th>Insurer Name</th>
                <th>Premium</th>
                <th>Policy Type</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="policy in policies">
                <td>{{policy.client_name}}</td>
                <td>{{policy.customer_address}}</td>
                <td>{{policy.customer_name}}</td>
                <td>{{policy.insurer_name}}</td>
                <td>{{policy.premium}}</td>
                <td>{{policy.policy_type}}</td>              
              </tr>
            </tbody>
          </table>`,
          data() {
            return {
              errorMsg: false,
              message: 'Hello World!',
              policies: [],
              customer_address: '',
            }
          },
          mounted: function() {
            this.getAllClients(); 
          },
          methods: {
            getAllClients() {
              axios.get('http://localhost:8000/api/policy/read.php').then((response) => {
                this.policies = response.data.policies; 
                console.log(response.data.policies);
              });
            }
          }
      });

      const App = new Vue({
        el: '#app',
      });

    </script>

  </body>
</html>