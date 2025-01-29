<template>
  <div class="flex items-center justify-between p-4 bg-yellow-400 rounded">
    <div class="flex items-center">
      <IconTrash name="trash" class="shrink-0 mr-2 w-4 h-4 stroke-yellow-800" />
      <div class="text-yellow-800 text-sm font-medium">
        <slot />
      </div>
    </div>
    <button class="text-yellow-800 hover:underline text-sm" tabindex="-1" type="button" @click="$emit('restore')">Restore</button>
  </div>
</template>

<script>
import Icon from '@/Shared/Icon.vue'
import IconTrash from '@/Shared/Icons/Trash.vue'

export default {
  components: {
    IconTrash,
  },
  emits: ['restore'],
}
</script>
