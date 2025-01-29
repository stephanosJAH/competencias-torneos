<template>
  <v-btn
      class="flex items-center mt-4"
      type="submit" 
      color="primary"
      :disabled="loading"
  >
    <div v-if="loading" class="btn-spinner mr-2" />
    <slot />
  </v-btn>
</template>

<script>
export default {
  props: {
    loading: Boolean,
  },
}
</script>
