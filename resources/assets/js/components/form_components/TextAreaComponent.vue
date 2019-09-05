<template>
  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ description }}</label>

    <div class="col-md-6">
      <textarea
        :id="name"
        :name="name"
        :class="['form-control']"
        :required="required"
      />
    </div>
  </div>
</template>

<script>
export default {
  props: ["description", "name", "required"]
};
</script>

<style>
</style>