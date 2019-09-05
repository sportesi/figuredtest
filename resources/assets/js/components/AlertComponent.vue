<template>
  <div :class="['alert', `alert-${type}`]" role="alert" v-if="this.$slots.default">
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: ["type"]
};
</script>