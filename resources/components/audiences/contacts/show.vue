<script setup lang="ts">
import NoCandidateStatImage from "@/svg/main/no_user_profile.svg?src";
import useCountries from "@/composables/countries";

const props = defineProps<{
    contact: App.Data.Audiences.Contacts.ContactData;
}>();

const country = ref<App.Data.CountryData | null>(null);

const { getCountry } = useCountries();
onMounted(
    async () =>
        (country.value = await getCountry(props.contact.country || "GH")),
);
</script>

<template>
    <div class="space-y-4 my-10 shadow-card p-10 rounded-xl">
        <div class="flex items-center gap-x-3">
            <div class="relative size-20 block shrink-none aspect-square">
                <img
                    class="inline-block size-full aspect-square rounded-full"
                    :src="contact.avatar || NoCandidateStatImage"
                    alt="Logo"
                    onload="this.classList.remove('hidden'); document.getElementById('image-loader').remove();"
                />
                <div
                    id="image-loader"
                    class="absolute size-full aspect-square rounded-full inset-0 bg-gray-300 animate-pulse"
                ></div>
            </div>

            <div class="">
                <span
                    class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                >
                    {{ contact.firstName }} {{ contact.otherNames }}
                    {{ contact.lastName }}
                </span>
                <div class="flex gap-2 flex-row flex-wrap">
                    <div
                        class="flex gap-1 items-center h-fit text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full"
                    >
                        <SharedCommonIcon name="mail" class="size-4" />
                        <span> {{ contact.email }}</span>
                    </div>

                    <div
                        class="flex gap-1 text-xs items-center whitespace-nowrap h-fit text-gray-500 bg-gray-100 px-2 py-1 rounded-full"
                    >
                        <SharedCommonIcon name="phone" class="h-4" />
                        <span>{{ contact.phone }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="divide-y divide-black/50">
            <div class="mt-6 _sm:my-4 space-y-4">
                <p class="font-semibold">Personal Information</p>
                <div class="flex">
                    <div class="text-sm grow gap-4 grid">
                        <div>
                            <p
                                class="block lg:whitespace-nowrap font-medium text-gray-500 dark:text-gray-100"
                            >
                                First Name
                            </p>
                            <p
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ contact.firstName }}
                            </p>
                        </div>
                        <div>
                            <p
                                class="block lg:whitespace-nowrap font-medium text-gray-500 dark:text-gray-100"
                            >
                                Other Names
                            </p>
                            <p
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ contact.otherNames || "--" }}
                            </p>
                        </div>
                        <div>
                            <p
                                class="block lg:whitespace-nowrap font-medium text-gray-500 dark:text-gray-100"
                            >
                                Last Name
                            </p>
                            <p
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ contact.lastName }}
                            </p>
                        </div>
                    </div>
                    <div class="text-sm gap-4 grid">
                        <div>
                            <p
                                class="block lg:whitespace-nowrap font-medium text-gray-500 dark:text-gray-100"
                            >
                                Title
                            </p>
                            <p
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ "--" }}
                            </p>
                        </div>
                        <div>
                            <p
                                class="block lg:whitespace-nowrap font-medium text-gray-500 dark:text-gray-100"
                            >
                                Birthday
                            </p>
                            <p
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ contact.dateOfBirth || "--" }}
                            </p>
                        </div>
                        <div>
                            <p
                                class="block lg:whitespace-nowrap font-medium text-gray-500 dark:text-gray-100"
                            >
                                Gender
                            </p>
                            <p
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ contact.gender }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 pt-6 _sm:my-4 space-y-4">
                <p class="font-semibold">Address</p>
                <div class="flex">
                    <div class="text-sm grow gap-4 grid">
                        <div>
                            <p
                                class="block lg:whitespace-nowrap font-medium text-gray-500 dark:text-gray-100"
                            >
                                Country
                            </p>
                            <div
                                class="lg:whitespace-nowrap flex items-center gap-1 font-semibold text-gray-800 dark:text-gray-200"
                            >
                                <div
                                    v-if="country"
                                    v-html="country.flag"
                                    class="h-4 w-6 flex items-center justify-center"
                                ></div>

                                <span>{{ country?.name || "--" }}</span>
                            </div>
                        </div>
                        <div>
                            <p
                                class="block lg:whitespace-nowrap font-medium text-gray-500 dark:text-gray-100"
                            >
                                State
                            </p>
                            <p
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ contact.state || "--" }}
                            </p>
                        </div>
                    </div>
                    <div class="text-sm gap-4 grid">
                        <div>
                            <p
                                class="block lg:whitespace-nowrap font-medium text-gray-500 dark:text-gray-100"
                            >
                                City
                            </p>
                            <p
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ contact.city || "--" }}
                            </p>
                        </div>
                        <div>
                            <p
                                class="block lg:whitespace-nowrap font-medium text-gray-500 dark:text-gray-100"
                            >
                                Address No
                            </p>
                            <p
                                class="block lg:whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                            >
                                {{ contact.address || "--" }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
