<template>
  <div class="alert alert-success" role="alert" v-if="this.$slots.default">
    <slot></slot>
  </div>
</template>

<script>
export default {};
</script>