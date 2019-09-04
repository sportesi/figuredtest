<template>
  <div class="card">
    <div class="card-header">
      <div class="float-left">
        <b>{{ post.title }}</b>
      </div>
      <div class="float-right">
        <i class="text-muted">{{ post.created_at }}</i>
      </div>
    </div>

    <div class="card-body">
      <p v-for="paragraph in post.body" v-bind:key="paragraph">{{ paragraph }}</p>
    </div>

    <div class="card-footer" v-if="this.$slots.footer">
      <slot name="footer"></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post"]
};
</script>

<style scoped>
.card {
  margin-bottom: 10px;
}
</style>