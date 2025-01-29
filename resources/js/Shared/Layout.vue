<template>
  <div>
    <div id="dropdown"/>
    <div class="md:flex md:flex-col">
      <div class="md:flex md:flex-col md:h-screen">
        <div class="md:flex md:shrink-0">

          <div :class="{ 'collapsed': menuOpen }" class="flex items-center justify-between px-6 py-4 bg-indigo-900 md:shrink-0 md:justify-center md:w-60">
            <Link class="mt-1 flex justify-center align-center gap-2" :href="`${baseUrl}`">
              <logo class="fill-white" width="28" height="28" />
              <div class="item-text-menu"> Competencias </div>
            </Link>
            <dropdown class="md:hidden" placement="bottom-end">
              <template #default>
                <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
              </template>
              <template #dropdown>
                <div class="mt-2 px-8 py-4 bg-indigo-800 rounded shadow-lg">
                  <main-menu />
                </div>
              </template>
            </dropdown>
          </div>

          <div class="md:text-md flex items-center justify-between w-full text-sm bg-white border-b md:py-0">
            <div class="flex gap-4">
              <div
                class="cursor-pointer p-4 lg:block hidden"
                @click="toggleMenu"
              >
                  <component
                    :is="menuOpen ? 'icon-arrow-right' : 'icon-menu'"
                    class="text-gray-500"
                  />
              </div>
              <div class="mr-4 mt-1 flex align-center gap-2">
                <IconBuild class="text-gray-500" />
                {{ auth.user.account.name }}
              </div>
            </div>
             <dropdown class="mt-1" placement="bottom-end">
              <template #default>
                <div class="group flex items-center cursor-pointer select-none">
                  <div class="flex items-center mr-1 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600 whitespace-nowrap">
                    <img v-if="auth.user.photo" class="block ml-4 w-8 h-8 rounded-full" :src="auth.user.photo" />
                    <span>{{ auth.user.first_name }}</span>
                    <span class="hidden md:inline">&nbsp;{{ auth.user.last_name }}</span>
                  </div>
                  <icon class="w-5 h-5 fill-gray-700 group-hover:fill-indigo-600 focus:fill-indigo-600" name="cheveron-down" />
                </div>
              </template>
              <template #dropdown>
                <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
                  <Link class="block px-6 py-2 hover:text-white hover:bg-indigo-500" :href="`${baseUrl}/users/${auth.user.id}/edit`">My Profile</Link>
                  <Link class="block px-6 py-2 hover:text-white hover:bg-indigo-500" :href="`${baseUrl}/users`">Manage Users</Link>
                  <Link class="block px-6 py-2 w-full text-left hover:text-white hover:bg-indigo-500" :href="`${baseUrl}/logout`" method="delete" as="button">Logout</Link>
                </div>
              </template>
            </dropdown>
          </div>
        </div>
        <!--  -->
        <div class="md:flex md:grow ">
          <main-menu :class="{ 'collapsed': menuOpen }" class="hidden shrink-0 p-4 w-60 bg-indigo-800 overflow-y-auto md:block"  />
          <div class="px-4 py-1 md:flex-1 md:p-12">
            <flash-messages />
            <slot />
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'

import IconBuild from '@/Shared/Icons/Build.vue'
import IconMenu from '@/Shared/Icons/Menu.vue'
import IconArrowRight from '@/Shared/Icons/ArrowRigth.vue'

import Icon from '@/Shared/Icon.vue'
import Logo from '@/Shared/Logo.vue'
import Dropdown from '@/Shared/Dropdown.vue'
import MainMenu from '@/Shared/MainMenu.vue'
import FlashMessages from '@/Shared/FlashMessages.vue'

export default {
  components: {
    Dropdown,
    IconBuild,
    IconMenu,
    IconArrowRight,
    FlashMessages,
    Icon,
    Link,
    Logo,
    MainMenu
  },
  props: {
    auth: Object,
  },
  data() {
    return {
      baseUrl: baseUrl,
      menuOpen: false,
    }
  },
  methods: {
    toggleMenu() {
      this.menuOpen = !this.menuOpen
    },
  },
}
</script>

<style>
.collapsed {
  width: 75px !important; /* o cualquier ancho que desees cuando el menú está colapsado */
  transition: width 0.3s ease; /* Transición para el colapso del menú */
}

.collapsed .item-text-menu {
  display: none;
}

.collapsed .item-icon-menu {
  justify-content: center;
}
</style>
