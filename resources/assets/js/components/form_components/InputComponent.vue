<template>
  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ description }}</label>

    <div class="col-md-6">
      <input :id="name" :type="type" class="form-control" :name="name" :required="required" />
    </div>
  </div>
</template>

<script>
export default {
  props: ["description", "name", "type", "required"]
};
</script>

<style>
</style>