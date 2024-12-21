<script setup lang="ts">
const props = defineProps<{
    elections: { id: number; name: string }[];
}>();

const form = useForm({
    method: "POST",
    url: route("audiences.store"),
    fields: {
        name: "",
        description: "",
        election_id: null,
        uploaded_contacts: null,
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
     <form
            @submit.prevent="form.submit"
            class="flex flex-col gap-5 mt-10 px-4 sm:px-8"
        >
            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.name"
                    :error="form.errors.name"
                    id="name"
                    name="name"
                    placeholder="Audience Name"
                />
            </div>
            <div>
                 <SharedFormBaseAdvanceSelect
                    selectMultiple                
                    :hideOnSelect="false"
                    v-model="form.fields.election_id"
                    :error="form.errors.election_id"
                    id="election_id"
                    name="election_id"
                    :options="electionOptions"
                    placeholder="Choose Elections for the Audience"
                    position="bottom-center"
                    options-class=""
                    option-class="py-1"
                    select-class="w-full py-3"
                />
            </div>

            <div>
                <SharedFormBaseTextarea
                    v-model="form.fields.description"
                    :error="form.errors.description"
                    id="description"
                    name="description"
                    placeholder="Enter audience description"
                />
            </div>
            <div>
                <SharedFormBaseFileUpload
                    v-model="form.fields.uploaded_contacts"
                />
            </div>

            <div class="py-10">
                <SharedFormSubmitButton text="create" />
            </div>
        </form>
</template>
