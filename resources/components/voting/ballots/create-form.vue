<script setup lang="ts">
const props = defineProps<{
    elections: { id: number; name: string }[];
}>();

const form = useForm({
    method: "POST",
    url: route("voting.ballots.store"),
    fields: {
        position: "",
        code: "",
        description: "",
        election_id: null,
        upload_file: null,
    },
    hooks: {
        success: () => form.reset(),
    },
});

const electionOptions = props.elections?.map((e: { id: any; name: any }) => ({
    value: e.id,
    label: e.name,
}));

const isUpload = ref(false);

const toggleUploadForm = () => {
    isUpload.value = !isUpload.value;
    form.fields.upload_file = null;
};
</script>

<template>
    <form @submit.prevent="form.submit" class="pb-12">
        <div class="grid gap-5">
            <!-- End Col -->

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.position"
                    :error="form.errors.position"
                    id="position"
                    name="position"
                    placeholder="Position"
                />
            </div>

            <!-- End Col -->

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.code"
                    :error="form.errors.code"
                    id="code"
                    name="code"
                    placeholder="Code"
                />
            </div>

            <!-- End Col -->

            <div class="sm:col-span-9">
                <SharedFormBaseTextarea
                    v-model="form.fields.description"
                    :error="form.errors.description"
                    id="description"
                    name="description"
                    placeholder="Enter ballot description"
                />
            </div>

            <div class="sm:col-span-9">
                <SharedFormBaseAdvanceSelect
                    hideOnSelect
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
        </div>

        <div v-if="isUpload" class="pt-5">
            <SharedFormBaseFileUpload v-model="form.fields.upload_file" />
        </div>

        <div class="mt-10 flex justify-end gap-x-2">
            <SharedFormSubmitButton text="Create" :loading="form.processing" />
        </div>
        <div class="mt-5">
            <a
                class="cursor-pointer text-primary-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-primary-500"
                @click="toggleUploadForm()"
            >
                {{ isUpload ? "Single?" : "Upload?" }}
            </a>
        </div>
    </form>
</template>
