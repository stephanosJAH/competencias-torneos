<template>
    <div class="text-center modal-delete">
        <v-dialog 
            width="500"
            v-model="dialogOpen"
        >
            <v-card>
                <v-card-title class="bg-red-500 items-center" style="color:white; display: flex !important;">
                    <icon-alert-circle class="stroke-white mr-2" />
                    <span>Eliminar registro</span>
                </v-card-title>
                <v-card-text class="my-2" style="padding: 20px 24px;">
                    ¿Esta seguro que desea eliminar el registro?
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="grey" text @click="dialogOpen = false">No</v-btn>
                    <v-btn color="error" text @click="deleteResource()">
                        Si
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-btn
            class="flex items-center mt-4"
            color="error"
            :disabled="loading"
            @click="dialogOpen = true"
        >
            <div v-if="loading" class="btn-spinner mr-2" />
            <icon-trash v-if="!loading" class="fill-white" />
            <slot />
        </v-btn>
    </div>
</template>

<script>
import IconTrash from '@/Shared/Icons/Trash.vue'
import IconAlertCircle from '@/Shared/Icons/AlertCircle.vue'


export default {
    props: {
        entityUrl: {
            type: String,
            required: true,
        },
        itemDelete: {
            type: Number,
            required: true,
        }
    },
    components: {
        IconTrash,
        IconAlertCircle,
    },
    data() {
        return {
            dialogOpen: this.mostrar_dialog,
            loading: false,
        }
    },
    methods: {
        deleteResource() {
            this.loading = true
            this.$inertia.delete(`${baseUrl}/users/${this.itemDelete}`)
            this.dialogOpen = false
            
        },
    },
}
</script>