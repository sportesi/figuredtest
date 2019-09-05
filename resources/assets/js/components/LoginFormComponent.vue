<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <alert-component type="danger" v-if="JSON.parse(errors).length > 0">
        <ul class="mb-0">
          <li v-for="error in JSON.parse(errors)" :key="error">{{ error }}</li>
        </ul>
      </alert-component>

      <card-component title="Login">
        <form method="POST" :action="route" aria-label="Login">
          <slot name="csrf"></slot>

          <input-component name="email" type="email" required="true" description="E-Mail Address"></input-component>

          <input-component name="password" type="password" required="true" description="Password"></input-component>

          <div class="form-group row">
            <div class="col-md-6 offset-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" />
                <label class="form-check-label" for="remember">Remember Me</label>
              </div>
            </div>
          </div>

          <submit-component cssclass="primary" text="Login">
            <a class="btn btn-link" v-bind:href="passreset">Forgot Your Password?</a>
          </submit-component>
        </form>
      </card-component>
    </div>
  </div>
</template>

<script>
import InputComponent from "./form_components/InputComponent";
import SubmitComponent from "./form_components/SubmitComponent";

export default {
  props: ["route", "errors", "passreset"],
  components: {
    InputComponent,
    SubmitComponent
  }
};
</script>

<style>
</style>