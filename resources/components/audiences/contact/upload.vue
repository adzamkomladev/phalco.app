<script setup lang="ts">
defineProps<{
    elections: App.Data.Elections.ElectionData[];
}>();

const form = useForm({
    method: "POST",
    // url: route(""),
    fields: {
        upload_file: "",
    },
    hooks: {
        success: () => form.reset(),
    },
});
</script>

<template>
    <form @submit.prevent="form.submit">
        <div class="grid gap-5">
            <SharedFormBaseFileUpload v-model="form.fields.upload_file" />
        </div>

        <div class="mt-10 flex justify-end gap-x-2">
            <SharedFormSubmitButton text="Create" :loading="form.processing" />
        </div>
    </form>
</template>
