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
      <p>{{ post.body }}</p>
    </div>

    <div class="card-footer" v-if="this.$slots.footer || auth">
      <slot name="footer"></slot>
      <div class="float-right" v-if="auth">
        
        <btn-form-modal text="Edit Post" method="POST" :id="'edit-post' + post._id" :action="'/post/edit/' + post._id">
          <slot name="csrf-edit"></slot>
          <input type="hidden" name="_method" value="put" />
          <input-component name="id" type="hidden" description="id" :value="post._id"></input-component>
          <input-component name="title" type="text" required="true" description="Title" :value="post.title"></input-component>
          <txta-component name="body" required="true" description="Body" :value="post.body"></txta-component>
        </btn-form-modal>

        <btn-form-modal cssclass='btn-danger' text="Delete Post" savebtn="Delete" method="POST" :id="'delete-post' + post._id" :action="'/post/' + post._id">
          <slot name="csrf-edit"></slot>
          <input type="hidden" name="_method" value="delete" />
          You are going to delete this post. Are you sure?
        </btn-form-modal>
        
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post", "auth"]
};
</script>

<style scoped>
.card {
  margin-bottom: 10px;
}
</style>