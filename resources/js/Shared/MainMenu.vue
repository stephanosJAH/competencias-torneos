<template>
  <div>
    <div class="item-menu mb-4 hover:border-b-2 hover:border-amber-700">
      <Link class="item-icon-menu group flex items-center py-3" href="/app-quick-start-inertia-vue/public/">
        <IconDashboard class="mr-2" 
          :class="isUrl('studies') ? 'text-white' : 'text-indigo-400 group-hover:text-white'" 
          />
        <div class="item-text-menu" :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">
          Dashboard
        </div>
      </Link>
    </div>
    <div class="mb-4 hover:border-b-2 hover:border-amber-700">
      <Link class="item-icon-menu group flex items-center py-3" href="/app-quick-start-inertia-vue/public/studies">
        <IconBuild class="mr-2" :class="isUrl('studies') ? 'text-white' : 'text-indigo-400 group-hover:text-white'" />
        <div class="item-text-menu" :class="isUrl('organizations') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Estudios</div>
      </Link>
    </div>
    <div class="mb-4 hover:border-b-2 hover:border-amber-700">
      <Link class="item-icon-menu group flex items-center py-3" href="/app-quick-start-inertia-vue/public/contacts">
        <icon name="users" class="mr-2 w-4 h-4" :class="isUrl('contacts') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div class="item-text-menu" :class="isUrl('contacts') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Contacts</div>
      </Link>
    </div>
    <div class="mb-4 hover:border-b-2 hover:border-amber-700">
      <Link class="item-icon-menu group flex items-center py-3" href="/app-quick-start-inertia-vue/public/reports">
        <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('reports') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div class="item-text-menu" :class="isUrl('reports') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Reports</div>
      </Link>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'
import IconBuild from '@/Shared/Icons/Build.vue'
import IconDashboard from '@/Shared/Icons/Dashboard.vue'

export default {
  components: {
    Icon,
    IconBuild,
    IconDashboard,
    Link,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
}
</script>
