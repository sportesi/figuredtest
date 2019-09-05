<template>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <alert-component type="danger" v-if="JSON.parse(errors).length > 0">
        <ul class="mb-0">
          <li v-for="error in JSON.parse(errors)" :key="error">{{ error }}</li>
        </ul>
      </alert-component>

      <card-component title="Register as Publisher">
        <form method="POST" :action="route" aria-label="Register as Publisher">
          <slot name="csrf"></slot>

          <input-component name="name" type="text" required="true" description="Name"></input-component>

          <input-component name="email" type="email" required="true" description="E-Mail Address"></input-component>

          <input-component name="password" type="password" required="true" description="Password"></input-component>

          <input-component name="password_confirmation" type="password" required="true" description="Confirm Password" ></input-component>

          <submit-component cssclass="primary" text="Register"></submit-component>
        </form>
      </card-component>
    </div>
  </div>
</template>

<script>
import InputComponent from "./form_components/InputComponent";
import SubmitComponent from "./form_components/SubmitComponent";

export default {
  props: ["route", "errors"],
  components: {
    InputComponent,
    SubmitComponent
  }
};
</script>

<style>
</style>