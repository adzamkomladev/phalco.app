<script setup lang="ts">
const props = defineProps<{}>();

const form = useForm({
    method: "POST",
    url: route("campaigns.sms.senders.store"),
    fields: {
        sender: "",
        reason: "",
        proof_docs_url: null,
    },
    hooks: {
        success: () => form.reset(),
    },
});
</script>

<template>
    <form @submit.prevent="form.submit">
        <div class="grid gap-5 mt-5">
            <SharedFormBaseInput
                placeholder="Sender Name"
                error=""
                v-model="form.fields.sender"
            />
            <SharedFormBaseTextarea
                v-model="form.fields.reason"
                placeholder="Reason"
            />
            <SharedFormBaseFileUpload
            type='png'
                placeholder="sender upload proof document here"
                v-model="form.fields.proof_docs_url"
            />
        </div>

        <div class="mt-10 flex justify-end gap-x-2">
            <SharedFormSubmitButton text="Create" :loading="form.processing" />
        </div>
    </form>
</template>
