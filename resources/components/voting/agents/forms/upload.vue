<script setup lang="ts">

import BrowseImage from '~/resources/svg/share/browse.svg'

const props = defineProps<{
    elections: { id: number; name: string }[];
}>();

const form = useForm({
    method: "POST",
    url: route("voting.agents.upload"),
    fields: {
        upload_file: "",
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
      

        <div class="grid  gap-5">
          <SharedFormBaseAdvanceSelect
                    hide-on-select
                     v-model="form.fields.election_id"
                    :error="form.errors.election_id"
                    id="channel_code"
                    name="channel_code"
                     :options="electionOptions"
                    placeholder="Payment Method Channel..."
                    position="bottom-center"
                    options-class=""
                    option-class="py-1"
                    select-class="w-full py-3"
                />
            <!-- End Col -->
        <SharedFormBaseFileUpload v-model="form.fields.upload_file" />

            
        </div>

      
         <div class="mt-10 flex justify-end gap-x-2">
                        <SharedFormSubmitButton
                            text="Make Payment"
                            :loading="form.processing"
                        />
                    </div>
    </form>
</template>
