<template>
  <div class="card">
    <div class="card-header">
      <b>{{ title }}</b>
    </div>

    <div class="card-body">
      <slot></slot>
    </div>

    <div class="card-footer" v-if="this.$slots.footer">
      <slot name="footer"></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title"]
};
</script>