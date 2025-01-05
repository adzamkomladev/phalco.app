<script setup lang="ts">
const props = defineProps<{
    audienceId: number;
}>();

const form = useForm({
    method: "POST",
    url: route("audiences.contacts.store", { id: props.audienceId }),
    fields: {
        avatar: "",
        first_name: "",
        last_name: "",
        other_names: null,
        gender: null,
        phone: null,
        email: "",
        date_of_birth: null,
        country: null,
        state: null,
        city: null,
        address: null,
        title: null,
    },
    hooks: {
        success: () => form.reset(),
    },
});
</script>

<template>
    <form @submit.prevent="form.submit">
        <div class="grid gap-5">
            <SharedFormBaseImageUpload v-model="form.fields.avatar" />
            <SharedFormBaseInput
                v-model="form.fields.first_name"
                :error="form.errors.first_name"
                id="first_name"
                name="first_name"
                placeholder="First Name"
            />

            <SharedFormBaseInput
                v-model="form.fields.other_names"
                :error="form.errors.other_names"
                id="other_names"
                name="other_names"
                :required="false"
                placeholder="Other Names"
            />

            <SharedFormBaseInput
                v-model="form.fields.last_name"
                :error="form.errors.last_name"
                id="last_name"
                name="last_name"
                placeholder="Last Name"
            />

            <SharedFormBaseRadioGroup
                v-model="form.fields.gender"
                :options="['male', 'female']"
                name="gender"
                label="Gender"
            />

            <SharedFormBaseInput
                v-model="form.fields.phone"
                :error="form.errors.phone"
                id="phone"
                name="phone"
                placeholder="+233 9087 6422"
                type="tel"
            />
            <SharedFormBaseInput
                v-model="form.fields.email"
                :error="form.errors.email"
                id="email"
                name="email"
                placeholder="Email"
                type="email"
            />
            <SharedFormBaseDatePicker
                v-model="form.fields.date_of_birth"
                :error="form.errors.date_of_birth"
                id="phone"
                name="phone"
                placeholder="dd/mm/dd"
            />

            <SharedFormBaseCountrySelect v-model="form.fields.country" />

            <SharedFormBaseInput
                v-model="form.fields.state"
                :error="form.errors.state"
                id="state"
                name="state"
                placeholder="State"
                type="text"
            />
            <SharedFormBaseInput
                v-model="form.fields.city"
                :error="form.errors.city"
                placeholder="City"
                id="city"
            />
            <SharedFormBaseInput
                v-model="form.fields.address"
                :error="form.errors.address"
                placeholder="Address"
                id="address"
            />
        </div>

        <div class="mt-10 flex justify-end gap-x-2">
            <SharedFormSubmitButton text="Create" :loading="form.processing" />
        </div>
    </form>
</template>
