<template>
    <v-breadcrumbs :items="items">
        <template v-slot:prepend>
        <component :is="iconToRender" size="small"/>
        <!-- <v-icon icon="$vuetify" ></v-icon> -->

        </template>
    </v-breadcrumbs>
</template>

<script>
export default {
    props: {
        items: {
            type: Array,
            required: true,
        },
        iconToRender: {
            type: String,
            required: false,
        }
    },
    data() {
        return {
            baseUrl : baseUrl
        }
    }
}
</script>