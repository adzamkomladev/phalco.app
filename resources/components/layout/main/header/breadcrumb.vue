<script setup lang="ts">
const { current } = useRoute();

const crumbs = computed(() =>
    current?.value?.split(".").filter((n) => n !== "index"),
);
</script>

<template>
    <div
        class="sticky py-2 top-0 flex justify-between inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 lg:hidden dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="flex items-center">
            <!-- Navigation Toggle -->
            <button
                type="button"
                class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-200 dark:hover:text-gray-500 dark:focus:text-gray-500"
                aria-haspopup="dialog"
                aria-expanded="false"
                aria-controls="hs-application-sidebar"
                aria-label="Toggle navigation"
                data-hs-overlay="#hs-application-sidebar"
            >
                <SharedCommonIcon name="gate" />
            </button>
            <!-- End Navigation Toggle -->

            <!-- Breadcrumb -->
            <ol class="ms-3 flex items-center whitespace-nowrap">
                <li
                    v-for="(crumb, index) in crumbs"
                    :key="index"
                    class="flex items-center text-sm text-gray-800 dark:text-gray-400"
                >
                    <SharedCommonIcon
                        name="chevron"
                        class="rotate-90 h-5 text-gray-600"
                    />{{ crumb }}
                </li>
            </ol>
            <!-- End Breadcrumb -->
        </div>
        <ElectionsSwitcher class="sm:hidden" />
    </div>
</template>
