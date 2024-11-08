<script setup lang="ts">
import useSecurity from "~/resources/composables/security";

const { user } = useSecurity();

const organizations = computed(
    () =>
        user.value?.member_organizations?.map(
            (o: App.Data.Organizations.OrganizationData) => ({
                id: o.id!,
                name: o.name,
                logo: o.logo,
                isCurrentOrganization:
                    o.id === user.value?.current_organization?.id,
            }),
        ) || [],
);
</script>

<template>
    <div class="hs-dropdown relative inline-flex w-full">
        <button
            id="hs-dropdown-with-dividers"
            type="button"
            class="w-full hs-dropdown-toggle flex items-center justify-between gap-x-3.5 py-2 px-2.5 pr-5 bg-gray-2  text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 dark:bg-slate-700 dark:text-white"
            aria-haspopup="menu"
            aria-expanded="false"
            aria-label="Dropdown"
        >
            <div class="flex gap-x-2 items-center">
                <img
                    class="shrink-0 size-[38px] rounded-full"
                    :src="user?.current_organization?.logo || ''"
                    alt="Organization Logo"
                />
                {{ user?.current_organization?.name }}
            </div>
            <SharedCommonIcon name="chevron_double" class="text-gray-500" />
        </button>

        <div
            class="hs-dropdown-menu border border-gray-50 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="hs-dropdown-with-dividers"
        >
            <div
                class="py-2 first:pt-0 last:pb-0 flex flex-col gap-1 divide-gray-100"
            >
                <router-link
                    method="PATCH"
                    :href="route('organizations.select')"
                    :data="{ organization_id: o.id }"
                    v-for="o in organizations"
                    :key="o.id"
                    class="flex items-center justify-between gap-x-3.5 py-2 px-3 hover:rounded-lg text-sm text-gray-800 hover:bg-gray-1 dark:hover:bg-slate-700 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                    :class="{ 'bg-gray-2 dark:bg-slate-700 rounded-lg': o.isCurrentOrganization }"
                >
                    <div class="flex gap-x-2 items-center">
                        <img
                            class="shrink-0 size-[28px] rounded-full"
                            :src="o.logo || ''"
                            alt="Organization Logo"
                        />
                        <span class="text-xs text-wrap">
                            {{ o.name }}
                        </span>
                    </div>

                    <svg
                        v-if="o.isCurrentOrganization"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="size-6 text-forest-400"
                    >
                        <path d="M20 6 9 17l-5-5" />
                    </svg>
                </router-link>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <router-link
                    class="flex items-center whitespace-nowrap gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                    :href="route('organizations.create')"
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
                    Add another organization
                </router-link>
            </div>

            <div class="py-2 first:pt-0 last:pb-0">
                <router-link
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                    :href="route('settings.team.index')"
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
                        class="lucide lucide-users"
                    >
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                    Team Settings
                </router-link>
            </div>
        </div>
    </div>
</template>
