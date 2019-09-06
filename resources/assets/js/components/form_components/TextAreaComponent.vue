<template>
  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ description }}</label>

    <div class="col-md-6">
      <textarea :id="name" :name="name" :class="['form-control']" :value="value" :required="required"></textarea>
    </div>
  </div>
</template>

<script>
export default {
  props: ["description", "name", "required", "value"]
};
</script>

<style>
</style>