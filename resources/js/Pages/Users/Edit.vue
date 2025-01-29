<template>
  <div>
    <Breadcrumbs :items="itemsBreadcrumb" :iconToRender="iconToRender"/>
    <Head :title="`${form.first_name} ${form.last_name}`" />
    <v-card
      class="mx-auto"
      hover
    >
      <v-card-item>
        <v-card-title>
          <h1 class="mb-8 text-3xl font-bold">Usuarios</h1>
        </v-card-title>
      </v-card-item>
      <v-card-text>
        <trashed-message 
          v-if="user.deleted_at" 
          class="mb-6 w-full" 
          @restore="restore"
        > 
          Este usuario ha sido eliminado 
        </trashed-message>
          <form @submit.prevent="update">
            <div class="flex flex-wrap -mb-8 -mr-6 p-8">
              <text-input v-model="form.first_name" :error="form.errors.first_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Nombre" />
              <text-input v-model="form.last_name" :error="form.errors.last_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Apellido" />
              <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full lg:w-1/2" label="Email" />
              <text-input v-model="form.password" :error="form.errors.password" class="pb-8 pr-6 w-full lg:w-1/2" type="password" autocomplete="new-password" label="Password" />
              <v-autocomplete
                label="Dueña/o"
                v-model="form.owner"
                :error="form.errors.owner"
                :items="[{
                    title: 'Si',
                    value: true
                  }, {
                    title: 'No',
                    value: false
                  }]"
                variant="underlined"
                class="pb-8 pr-6 w-full lg:w-1/2"
              ></v-autocomplete>
              <div class="pb-8 pr-6 w-full lg:w-1/2 flex gap-2">
                <file-input 
                  class="lg:w-full"
                  v-model="form.photo" 
                  :error="form.errors.photo" 
                  type="file" accept="image/*" label="Avatar" 
                />
                <div class=" w-24 border border-gray-400 flex items-center justify-center">
                  <img v-if="user.photo" class="block w-8 h-8 rounded-full" :src="user.photo" />
                </div>
              </div>
            </div>
            <div class="flex items-center px-8 py-4 border-gray-100">
              <modal-delete
                v-if="!user.deleted_at"
                :entityUrl="'users'" 
                :itemDelete="user.id" 
              >
                Eliminar Usuario
              </modal-delete>
              <loading-button 
                v-if="!user.deleted_at"
                :loading="form.processing" 
                class="btn-indigo ml-auto" 
                type="submit"
              >
                Editar Usuario
              </loading-button>
            </div>
          </form>
      </v-card-text>
    </v-card>
    
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Breadcrumbs from '@/Shared/Layout/Breadcrumbs.vue'
import IconUser from '@/Shared/Icons/User.vue'
import Layout from '@/Shared/Layout.vue'
import TextInput from '@/Shared/FormInputs/TextInput.vue'
import FileInput from '@/Shared/FileInput.vue'
import SelectInput from '@/Shared/SelectInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'
import ModalDelete from '@/Shared/Modals/Delete.vue'
import TrashedMessage from '@/Shared/TrashedMessage.vue'

export default {
  components: {
    Breadcrumbs,
    IconUser,
    FileInput,
    Head,
    Link,
    LoadingButton,
    ModalDelete,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  layout: Layout,
  props: {
    user: Object,
  },
  remember: 'form',
  data() {
    return {
      baseUrl: baseUrl,
      form: this.$inertia.form({
        _method: 'put',
        first_name: this.user.first_name,
        last_name: this.user.last_name,
        email: this.user.email,
        password: '',
        owner: this.user.owner,
        photo: null,
      }),
      iconToRender: IconUser,
      itemsBreadcrumb: [
        {
          title: 'Usuarios',
          disabled: false,
          href: baseUrl + '/users',
        },
        {
          title: this.user.first_name + ' ' + this.user.last_name,
          disabled: true,
        },
      ],
    }
  },
  methods: {
    update() {
      this.form.post(`${baseUrl}/users/${this.user.id}`, {
        onSuccess: () => this.form.reset('password', 'photo'),
      })
    },
    restore() {
      if (confirm('Estás seguro de que quieres restaurar este usuario')) {
        this.$inertia.put(`${baseUrl}/users/${this.user.id}/restore`)
      }
    },
  },
}
</script>
