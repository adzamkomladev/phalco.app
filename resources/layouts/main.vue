<script setup lang="ts">
import useSecurity from "../composables/security";

onMounted(() => {
    setTimeout(() => {
        window.HSStaticMethods.autoInit();
    }, 100);
});

const { user } = useSecurity();
</script>

<template>
    <main>
        <!-- ========== HEADER ========== -->
        <LayoutMainHeaderShow />
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <div class="-mt-px">
            <!-- Breadcrumb -->
            <LayoutMainHeaderBreadcrumb />
            <!-- End Breadcrumb -->
        </div>

        <!-- Sidebar -->
        <div
            id="hs-application-sidebar"
            class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform w-[260px] h-full hidden fixed inset-y-0 start-0 z-[60] bg-white border-e border-gray-200 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 dark:bg-neutral-800 dark:border-neutral-700"
            role="dialog"
            tabindex="-1"
            aria-label="Sidebar"
        >
            <div class="relative flex flex-col h-full max-h-full">
                <div class="px-6 pt-4">
                    <!-- Logo -->
                    <router-link
                        class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                        :href="route('home')"
                        aria-label="Phalco"
                    >
                        <SharedCommonIcon
                            name="logo_full"
                            class="text-blue-700"
                        />
                    </router-link>
                    <!-- End Logo -->
                </div>

                <!-- Content -->
                <div
                    class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
                >
                    <LayoutMainSidebarNav />
                </div>
                <!-- End Content -->
            </div>
        </div>
        <!-- End Sidebar -->

        <!-- Content -->
        <div class="w-full lg:ps-64">
            <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
                <!-- your content goes here ... -->
                <slot />
            </div>
        </div>
        <!-- End Content -->
        <!-- ========== END MAIN CONTENT ========== -->
    </main>
</template>
