<script setup lang="ts">
import PolloingStationImage from "~/resources/images/voting/new_audience.png?src";


useHead({
    title: "New Audience",
});

const elections: any = useProperty("elections.all");


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
</script>

<template>
    <SharedCommonOverlay
        class="max-w-xl _sm:max-w-full"
        title="New Audience"
        size="xl"
    >
 <div
            class="flex flex-row-reverse rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
        >
            <div class="font-medium pt-10 basis-1/2 shrink-0 grow">
                <p class="text-gray-50 text-lg dark:text-gray-100">
                    Add new Polling Station
                    <!-- {{ electionOptions }} -->
                </p>
                <p class="font-normal text-xs dark:text-gray-300 text-gray-100">
                    Select or create a new account for withdwaral purposes
                </p>
            </div>
            <div class="h-60 p-5 shrink-0">
                <img
                    :src="PolloingStationImage"
                    class="_sm:hidden h-full w-auto"
                />
            </div>
        </div>

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
            <!-- <div>
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
            </div> -->

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
    </SharedCommonOverlay>
</template>
