<script setup lang="ts"></script>

<template>
    <header
        class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px] dark:bg-gray-800 dark:border-gray-700"
    >
        <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
            <div class="me-5 lg:me-0 lg:hidden">
                <!-- Logo -->
                <router-link
                    class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                    :href="route('home')"
                    aria-label="Phalco"
                >
                    <SharedCommonIcon
                        name="logo_full"
                        class="text-primary-logo"
                    />
                </router-link>
                <!-- End Logo -->
            </div>

            <div
                class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3"
            >
                <div class="flex grow _sm:hidden">
                    <!-- Search Input -->
                    <div class="">
                        <ElectionsSwitcher />
                    </div>
                    <!-- End Search Input -->
                </div>

                <div class="flex flex-row items-center justify-end gap-1">
                    <button
                        type="button"
                        class="md:hidden size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                    >
                        <SharedCommonIcon name="search" />
                        <span class="sr-only">Search</span>
                    </button>

                    <button
                        type="button"
                        class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                    >
                        <SharedCommonIcon name="bell" />
                        <span class="sr-only">Notifications</span>
                    </button>

                    <button
                        type="button"
                        class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                    >
                        <SharedCommonIcon name="wave" />
                        <span class="sr-only">Activity</span>
                    </button>

                    <LayoutMainAccountNavDropdown />
                </div>
            </div>
        </nav>
    </header>
</template>
