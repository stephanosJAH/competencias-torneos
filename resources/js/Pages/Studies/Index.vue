<template>
  <div>
    <Breadcrumbs :items="itemsBreadcrumb" :iconToRender="iconToRender"/>
    <Head title="Estudios" />
    <v-card
      class="mx-auto"
      hover
    >
      <v-card-item>
        <v-card-title>
          <h1 class="mb-8 text-3xl font-bold">Estudios</h1>
        </v-card-title>
      </v-card-item>
      <v-card-text>
        <div class="flex items-center justify-between mb-6">
          <search-filter 
            v-model="form.search" 
            class="mr-4 w-full max-w-md" 
            @reset="reset"
          >
            <label class="block text-gray-700">Trashed:</label>
            <select v-model="form.trashed" class="form-select mt-1 w-full">
              <option :value="null" />
              <option value="with">With Trashed</option>
              <option value="only">Only Trashed</option>
            </select>
          </search-filter>
          <Link class="btn-indigo" :href="`${baseUrl}/studies/create`">
            <span>Crear</span>
            <span class="hidden md:inline">&nbsp;Estudio</span>
          </Link>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
          <table class="w-full whitespace-nowrap">
            <thead>
              <tr class="text-left font-bold">
                <th class="pb-4 pt-6 px-6">Nombre</th>
                <th class="pb-4 pt-6 px-6">Ciudad</th>
                <th class="pb-4 pt-6 px-6" colspan="2">Telefono</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="study in studies.data" :key="study.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                <td class="border-t">
                  <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`${baseUrl}/studies/${study.id}/edit`">
                    {{ study.name }}
                    <icon v-if="study.deleted_at" name="trash" class="shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                  </Link>
                </td>
                <td class="border-t">
                  <Link class="flex items-center px-6 py-4" :href="`${baseUrl}/studies/${study.id}/edit`" tabindex="-1">
                    {{ study.city }}
                  </Link>
                </td>
                <td class="border-t">
                  <Link class="flex items-center px-6 py-4" :href="`${baseUrl}/studies/${study.id}/edit`" tabindex="-1">
                    {{ study.phone }}
                  </Link>
                </td>
                <td class="w-px border-t">
                  <Link class="flex items-center px-4" :href="`${baseUrl}/studies/${study.id}/edit`" tabindex="-1">
                    <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                  </Link>
                </td>
              </tr>
              <tr v-if="studies.data.length === 0">
                <td class="px-6 py-4 border-t" colspan="4">No studies found.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </v-card-text>
    </v-card>
    <pagination class="mt-6" :links="studies.links" />
  </div>
</template>

<script>
import Breadcrumbs from '@/Shared/Layout/Breadcrumbs.vue'
import Dashboard from '@/Shared/Icons/Dashboard.vue'

import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout.vue'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination.vue'
import SearchFilter from '@/Shared/SearchFilter.vue'

export default {
  components: {
    Breadcrumbs,
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    studies: Object,
  },
  data() {
    return {
      baseUrl : baseUrl,
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
      iconToRender: Dashboard,
      itemsBreadcrumb: [
        {
          title: 'Inicio',
          disabled: false,
          href: baseUrl + '/',
        },
        {
          title: 'Estudios',
          disabled: true,
          href: baseUrl + 'studies',
        },
      ],
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(`${baseUrl}/studies   `, pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
    hola() {
      confirm('hola')
    },
  },
}
</script>
