<script setup lang="ts">
const props = defineProps<{
    elections: { id: number; name: string }[];
}>();

const form = useForm({
    method: "POST",
    // url: route(""),
    fields: {
        first_name:'',
        other_names:null,
        last_name:'',
        gender:null,
        phone:null,
        email:'',
        birthday:null,
        country:null,
        state:null,
        address:null,
     
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
                placeholder="Other Names"
            />
        
            <SharedFormBaseInput
                v-model="form.fields.last_name"
                :error="form.errors.last_name"
                id="last_name"
                name="last_name"
                placeholder="Last Name"
            />
            <SharedFormBaseInput
                v-model="form.fields.phone"
                :error="form.errors.phone"
                id="phone"
                name="phone"
                placeholder="+233 9087 6422"
                type='number'
            />
            <SharedFormBaseInput
                v-model="form.fields.email"
                :error="form.errors.email"
                id="email"
                name="email"
                placeholder="Email"
                type='email'
            />
            <SharedFormBaseDatePicker
                v-model="form.fields.phone"
                :error="form.errors.phone"
                id="phone"
                name="phone"
                placeholder="+233 9087 6422"
                type='phone'
            />
    <SharedFormBaseCountrySelect
             v-model="form.fields.country"

            />
          
               <SharedFormBaseInput
                v-model="form.fields.state"
                :error="form.errors.state"
                id="state"
                name="state"
                placeholder="State"
                type='text'
            />     
            <SharedFormBaseInput
                v-model="form.fields.address"
                :error="form.errors.address"
                id="address"
                name="address"
                placeholder="address"
            />
        </div>

        <div class="mt-10 flex justify-end gap-x-2">
            <SharedFormSubmitButton text="Create" :loading="form.processing" />
        </div>
    </form>
</template>
