<script setup lang="ts">
import { Ballot, Option } from "~/resources/interfaces/agents/create.interface";

const props = defineProps<{
    ballot: Ballot;
}>();

const optionFields = props.ballot.options
    .map((o: Option) => ({
        id: o.id,
        name: o.name,
        avatar: o.avatar,
        order: o.order,
        votes: 0,
    }))
    .sort((a: any, b: any) => a.order - b.order);

const form = useForm({
    method: "POST",
    url: route("finance.payments.methods.store"),
    fields: {
        options: optionFields,
        feedback: "",
        uploaded_file: null,
    },
    hooks: {
        success: () => form.reset(),
    },
});

const isUpload = ref(false);

const toggleUploadForm = () => {
    isUpload.value = !isUpload.value;
    // form.fields.upload_file = null;
};
</script>

<template>
    <form @submit.prevent="form.submit" class="pb-12">
        <div class="grid gap-5">
            <div class="pb-5">
                <p class="text-xl font-semibold">{{ ballot.position }}</p>
                <p class="text-black/50 text-sm">{{ ballot.description }}</p>
            </div>
            <!-- End Col -->

            <div
                v-for="(optionField, index) in optionFields"
                :key="index"
                class="sm:col-span-9 shadow-md grid p-3 gap-5 rounded-md"
            >
                <div class="flex justify-between font-medium">
                    <div class="flex gap-2 items-center">
                        <img
                            :src="optionField.avatar!"
                            class="inline-block size-[38px] rounded-full border"
                        />
                        <p>{{ optionField.name }}</p>
                    </div>
                    <div class="">Npp</div>
                </div>
                <SharedFormBaseInput
                    id="votes"
                    name="votes"
                    placeholder="0"
                    type="number"
                    v-model="optionField.votes"
                />
            </div>
        </div>

        <div class="pt-5">
            <div class="pb-5">
                <p class="text-base font-semibold">Give Feedback</p>
                <p class="text-black/50 text-sm">Lorem ipsum dolor sit amet</p>
            </div>

            <div class="sm:col-span-9">
                <SharedFormBaseTextarea
                    id="feedback"
                    name="feedback"
                    placeholder="Enter your feedback"
                    v-model="form.fields.feedback"
                />
            </div>
            <div v-if="isUpload" class="pt-5">
                <SharedFormBaseFileUpload v-model="form.fields.uploaded_file" />
            </div>
        </div>

        <div class="mt-5 mobile:text-center">
            <a
                class="cursor-pointer text-primary-500 mobile:text-sm decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-primary-500"
                @click="toggleUploadForm()"
            >
                {{ isUpload ? "cancel image upload" : "Attach image ?" }}
            </a>
        </div>

        <div class="mt-5 flex justify-center gap-x-2">
            <button
                class="text-white w-full mobile:w-[80%] bg-secondary-300 rounded-md mobile:text-sm font-medium py-2 mobile:py-1"
            >
                Create
            </button>
        </div>
    </form>
</template>
