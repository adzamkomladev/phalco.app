<script setup lang="ts">
const props = defineProps<{
    elections: { id: number; name: string }[];
}>();

const form = useForm({
    method: "POST",
    url: route("voting.agents.store"),
    fields: {
        first_name: "",
        last_name: "",
        email: "",
        election_id: null,
        polling_station_id: null,
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
           
            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.first_name"
                    :error="form.errors.first_name"
                    id="first_name"
                    name="first_name"
                    placeholder="Agent First Name"
                />
            </div>

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.last_name"
                    :error="form.errors.last_name"
                    id="last_name"
                    name="last_name"
                    placeholder="Agent Last Name"
                />
            </div>

            <!-- End Col -->

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.email"
                    :error="form.errors.email"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Agent Email Address"
                />
            </div>
        </div>

        <div class="mt-10 flex justify-end gap-x-2">
            <SharedFormSubmitButton text="Create" :loading="form.processing" />
        </div>
    </form>
</template>
