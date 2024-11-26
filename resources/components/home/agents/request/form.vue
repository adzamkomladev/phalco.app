<script setup lang="ts">
const form = useForm({});

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
                <p class="text-xl font-semibold">Election Result</p>
                <p class="text-black/50 text-sm">Lorem ipsum dolor sit amet</p>
            </div>
            <!-- End Col -->

            <div class="sm:col-span-9 shadow-md grid p-3 gap-5 rounded-md">
                <div class="flex justify-between font-medium">
                    <div class="flex gap-2 items-center">
                        <img
                            class="inline-block size-[38px] rounded-full border"
                        />
                        <p>Komla Adzam</p>
                    </div>
                    <div class="">Npp</div>
                </div>
                <SharedFormBaseInput
                    id="position"
                    name="position"
                    placeholder="Votes"
                    type="number"
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
                    id="description"
                    name="description"
                    placeholder="comment"
                />
            </div>
            <div v-if="isUpload" class="pt-5">
                <SharedFormBaseFileUpload />
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
