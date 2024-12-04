<script setup lang="ts">
const props = defineProps<{
    elections: { id: number; name: string }[];
}>();

const form = useForm({
    method: "POST",
    url: route("voting.polling-stations.store"),
    fields: {
        name: "",
        code: null,
        election_id: null,
    },
    hooks: {
        success: () => form.reset(),
    },
});

const electionOptions = props.elections?.map((e: { id: any; name: any }) => ({
    value: e.id,
    label: e.name,
}));
</script>

<template>
    <form @submit.prevent="form.submit">
        <div class="grid gap-5">
            <SharedFormBaseInput
                v-model="form.fields.name"
                :error="form.errors.name"
                id="name"
                name="name"
                placeholder="Polling Station Name"
            />

            <SharedFormBaseInput
                v-model="form.fields.code"
                :error="form.errors.code"
                id="code"
                name="code"
                placeholder="Polling Station Code"
            />

            <SharedFormBaseAdvanceSelect
                v-model="form.fields.election_id"
                :error="form.errors.election_id"
                id="election_id"
                name="election_id"
                :options="electionOptions"
                placeholder="Select Election..."
                position="bottom-center"
                options-class=""
                option-class="py-1"
                select-class="w-full py-3"
            />
        </div>

        <div class="mt-10 flex justify-end gap-x-2">
            <SharedFormSubmitButton text="Create" :loading="form.processing" />
        </div>
    </form>
</template>