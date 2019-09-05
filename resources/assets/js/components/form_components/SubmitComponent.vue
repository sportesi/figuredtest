<template>
  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <button type="submit" v-bind:class="['btn', `btn-${ cssclass }`]">{{ text }}</button>
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: ["cssclass", "text"]
};
</script>

<style>
</style>