<script setup lang="ts">
useHead({
    title: "Select an Organization",
});
const props = defineProps<{
    organizations: App.Data.Organizations.OrganizationData[];
}>();
const organizations = props.organizations.map((o) => ({
    value: o.id!,
    label: o.name!,
}));
const isNotEmpty = computed(() => organizations.length !== 0);
const organization = ref<number | null>(null);
const loading = ref(false);

watch(
    organization,
    async (newOrganization: number | null, _: number | null) => {
        if (newOrganization) {
            loading.value = true;
            try {
                const res = await router.patch(route("organizations.select"), {
                    data: { organization_id: +newOrganization },
                });
            } catch (error) {
            } finally {
                loading.value = false;
            }
        }
    }
);
</script>

<template layout="organization">
    <div
        class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1
                    class="block text-2xl font-bold text-gray-800 dark:text-white"
                >
                    Create an organization
                </h1>
            </div>
            <div class="mt-8 flex items-center justify-between">
                <SharedFormBaseSelect
                    v-if="isNotEmpty"
                    v-model="organization"
                    id="organization"
                    name="organization"
                    :options="organizations"
                />
                <router-link
                    :href="route('organizations.create')"
                    :class="{ 'w-full': !isNotEmpty }"
                    class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-plus"
                    >
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>
                    Create Organization
                </router-link>
            </div>
        </div>
    </div>
</template>
