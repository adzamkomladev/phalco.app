<script setup lang="ts">
import ContactsFormImage from "@/svg/main/contact_form.svg?src";

useHead({
    title: "New Audience",
});

const props = defineProps<{
    audience: App.Data.Audiences.AudienceData;
}>();

const elections = useProperty("elections.all");

const isUpload = ref(false);
const toggleUploadForm = () => (isUpload.value = !isUpload.value);
const audienceId = computed(() => props.audience.id!);
</script>

<template>
    <SharedCommonOverlay
        class="max-w-xl _sm:max-w-full"
        title="New Contact"
        size="xl"
        headerClass=""
    >
        <div class="mb-10">
            <div
                class="flex flex-row-reverse rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
            >
                <div
                    class="font-medium pr-2 place-self-center basis-1/2 shrink-0 grow"
                >
                    <p class="text-gray-50 text-lg dark:text-gray-100">
                        {{
                        isUpload
                            ? "Upload contacts to  "
                            : "Add new Contacts to"
                    }}
                        <span class="">{{ audience.name }}</span>
                    </p>
                    <p
                        class="font-normal text-xs dark:text-gray-300 text-gray-100"
                    >
                        {{ audience.description }}
                    </p>
                </div>
                <div class="h-52 p-5 _xs:size-40 shrink-0">
                    <img :src="ContactsFormImage" class="h-full w-auto" />
                </div>
            </div>

            <div class="mt-5">
                <transition mode="out-in">
                    <AudiencesContactsForm
                        :audience-id="audienceId"
                        :elections="elections"
                        v-if="!isUpload"
                    />
                    <AudiencesContactsUpload :elections="elections" v-else />
                </transition>
            </div>
            <div class="mt-5">
                <a
                    class="cursor-pointer text-primary-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-primary-500"
                    @click.prevent="toggleUploadForm"
                >
                    {{
                        isUpload
                            ? "create single contact ?"
                            : "Upload contacts ?"
                    }}
                </a>
            </div>
        </div>
    </SharedCommonOverlay>
</template>
<style scoped>
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
