<template>
  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 offset-sm-2">
          <div>
            <h2>Vue.js + VeeValidate - Form Validation</h2>
            <form @submit.prevent="handleSubmit">
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" v-model="user.firstName" v-validate="'required'" id="firstName" name="firstName" class="form-control" :class="{ 'is-invalid': submitted && errors.has('firstName') }" />
                <div v-if="submitted && errors.has('firstName')" class="invalid-feedback">
                  {{ errors.first("firstName") }}
                </div>
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" v-model="user.lastName" v-validate="'required'" id="lastName" name="lastName" class="form-control" :class="{ 'is-invalid': submitted && errors.has('lastName') }" />
                <div v-if="submitted && errors.has('lastName')" class="invalid-feedback">
                  {{ errors.first("lastName") }}
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" v-model="user.email" v-validate="'required|email'" id="email" name="email" class="form-control" :class="{ 'is-invalid': submitted && errors.has('email') }" />
                <div v-if="submitted && errors.has('email')" class="invalid-feedback">
                  {{ errors.first("email") }}
                </div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" v-model="user.password" v-validate="{ required: true, min: 6 }" id="password" name="password" class="form-control" :class="{ 'is-invalid': submitted && errors.has('password') }" />
                <div v-if="submitted && errors.has('password')" class="invalid-feedback">
                  {{ errors.first("password") }}
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "app",
  data() {
    return {
      user: {
        firstName: "",
        lastName: "",
        email: "",
        password: ""
      },
      submitted: false
    };
  },
  methods: {
    handleSubmit(e) {
      this.submitted = true;
      this.$validator.validate().then(valid => {
        if (valid) {
          alert("SUCCESS!! :-)\n\n" + JSON.stringify(this.user));
        }
      });
    }
  }
};
</script>