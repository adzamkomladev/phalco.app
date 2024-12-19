<script setup lang="ts">
const props = defineProps<{
    elections: { id: number; name: string }[];
}>();

const form = useForm({
    // url:
    method: "POST",
    fields: {
        candidate_logo: null,
        candidate_name: "",
        party: "",
        option_order: null,
        party_logo: null,
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
    <form @submit.prevent="form.submit" class="pb-12">
        {{ form }}
        <div class="grid gap-5 pb-5">
            <div class="sm:col-span-9">
                <SharedFormBaseImageUpload
                    v-model="form.fields.candidate_logo"
                    :error="form.errors.candidate_logo"
                    id="candidate_name"
                    name="candidate_name"
                    placeholder="Candidate Name"
                />
            </div>
            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.candidate_name"
                    :error="form.errors.candidate_name"
                    id="candidate_name"
                    name="candidate_name"
                    placeholder="Candidate Name"
                />
            </div>
            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.party"
                    :error="form.errors.party"
                    id="party"
                    name="party"
                    placeholder="Party/Organization"
                />
            </div>
            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.option_order"
                    :error="form.errors.option_order"
                    id="position"
                    name="position"
                    type="number"
                    placeholder="candidate Position"
                />
            </div>
        </div>
        <div class="">
            <SharedFormBaseFileUpload
                fileTypes=".png,.jpeg,.webp"
                v-model="form.fields.party_logo"
                placeholder="browse through your file or drop to upload organization/party party logo"
            />
        </div>

        <div class="mt-10 flex justify-end gap-x-2">
            <SharedFormSubmitButton text="Create" :loading="form.processing" />
        </div>
    </form>
</template>
