<template>
    <v-container class="flex h-screen items-center justify-center">
        <v-row justify="center" class="flex flex-col  items-center">
            <div>
                <Logo width="48"  height="48" />
            </div>
            <v-col cols="12" sm="8" md="6">
                <v-card>
                    <v-card-title class="text-center">
                        Login
                    </v-card-title>
                    <v-card-text>
                        <v-form @submit.prevent="login">
                            <v-text-field
                                v-model="form.email"
                                label="Email"
                                variant="underlined"
                                required
                            >
                                <template v-slot:prepend>
                                    <IconUser />
                                </template>
                            </v-text-field>
                            <v-text-field
                                v-model="form.password"
                                label="Password"
                                variant="underlined"
                                required
                            >
                                <template v-slot:prepend>
                                    <IconLock />
                                </template>
                            </v-text-field>
                            <v-checkbox 
                                v-model="form.remember"
                                label="Recordarme"
                                color="red"
                                value="red"
                                hide-details
                            >
                            </v-checkbox>
                            <loading-button 
                                :loading="form.processing" 
                                class="btn-indigo ml-auto" 
                                type="submit"
                            >
                                Ingresar
                            </loading-button>
                        </v-form>
                        <v-divider class="my-4"></v-divider>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import Logo from '@/Shared/Logo.vue';
import IconUser from '@/Shared/Icons/User.vue';
import IconLock from '@/Shared/Icons/Lock.vue';
import LoadingButton from '@/Shared/LoadingButton.vue'

export default {
    components: {
        Logo,
        IconUser,
        IconLock,
        LoadingButton
    },
    data() {
    return {
      form: this.$inertia.form({
        email: 'admin@admin.com',
        password: 'secret',
        remember: false,
      }),
    }
  },
  methods: {
    login() {
        this.form.post(`${baseUrl}/login`)
    },
  },
};
</script>
