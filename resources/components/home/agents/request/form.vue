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
            <!-- End Col -->

            <div class="sm:col-span-9 shadow-card">
                <div></div>
                <SharedFormBaseInput
                    id="position"
                    name="position"
                    placeholder="Ballot Position"
                />
            </div>

            <!-- End Col -->

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    id="code"
                    name="code"
                    placeholder="Ballot Code"
                />
            </div>

            <!-- End Col -->
        </div>

        <div class="pt-5">
            <div class="pb-5">
                <p class="text-xl font-semibold">Election Result</p>
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

        <div class="mt-10 flex justify-center gap-x-2">
            <button class="text-white w-full mobile:w-[80%] bg-secondary-500">
                Create
            </button>
        </div>
    </form>
</template>
