<script setup lang="ts">
import useSecurity from "~/resources/composables/security";

const { user } = useSecurity();
</script>

<template>
    <div
        class="hs-dropdown [--placement:bottom-right] relative inline-flex z-50"
    >
        <button
            id="hs-dropdown-account"
            type="button"
            class="size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:text-white"
            aria-haspopup="menu"
            aria-expanded="false"
            aria-label="Dropdown"
        >
            <img
                class="shrink-0 size-[38px] mobile:size-[25px] rounded-full"
                :src="user?.avatar || ''"
                alt="Avatar"
            />
        </button>

        <div
            class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="hs-dropdown-account"
        >
            <div class="py-3 px-5 bg-gray-100 rounded-t-lg dark:bg-gray-700">
                <p class="text-sm text-gray-500 dark:text-gray-500">
                    Signed in as
                </p>
                <p class="text-sm font-medium text-gray-800 dark:text-gray-200">
                    {{ user?.name }}
                </p>
            </div>
            <div class="p-1.5 space-y-0.5">
                <router-link
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700 dark:focus:text-gray-300"
                    method="POST"
                    :href="route('logout')"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-log-out"
                    >
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    Logout
                </router-link>
            </div>
        </div>
    </div>
</template>
