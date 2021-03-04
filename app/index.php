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
    <link rel="stylesheet" href="css/styles.css">

    <title>Insurance Policies</title>
  </head>

  <body>
    <div class="container">
      <div role="main" class="container">
        <h1 class="mb-3">Insurance Policies</h1>
        <p class="lead">List of all current policies<p>
        
        <div class="col-xs-12">
          <p>Click the headers of the table to sort table according to that column</p>
        </div>
        <div id="app" class="col-md-8">
          <table class="table table-striped table-hover policy-table">
              <thead class="thead-dark">
                <tr class="table-dark"> 
                  <th @click="sort('client_name')">Client Name</th>
                  <th @click="sort('customer_address')">Customer Address</th>
                  <th @click="sort('customer_name')">Customer Name</th>
                  <th @click="sort('insurer_name')">Insurer Name</th>
                  <th @click="sort('premium')">Premium</th>
                  <th @click="sort('policy_type')">Policy Type</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="policy in sortedPolicies">
                  <td>{{policy.client_name}}</td>
                  <td>{{policy.customer_address}}</td>
                  <td>{{policy.customer_name}}</td>
                  <td>{{policy.insurer_name}}</td>
                  <td>{{policy.premium}}</td>
                  <td>{{policy.policy_type}}</td>              
                </tr>
              </tbody>
            </table>

            debug: sort={{currentSort}}, dir={{currentSortDir}}
        </div>
      </div>
    </div>

    <script>

      const App = new Vue({
        el: '#app',
        data() {
          return {
            policies: [],
            currentSort: 'client_name',
            currentSortDir: 'asc'
          }
        },
        created: function() {
          fetch('http://localhost:8000/api/policy/read.php')
            .then(res => res.json())
            .then(res => {
              this.policies = res.policies;
            })
        },
        methods: {
          sort: function(s) {
            if(s === this.currentSort) {
              this.currentSortDir = this.currentSortDir === 'asc' ? 'desc' : 'asc';
            }
            this.currentSort = s; 
          }
        },
        computed: {
          sortedPolicies: function() {
            return this.policies.sort((a, b) => {
              let modifier = 1;
              if(this.currentSortDir === 'desc') modifier = -1;
              if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
              if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
              return 0;
            });
          }
        }
      });

    </script>

  </body>
</html>