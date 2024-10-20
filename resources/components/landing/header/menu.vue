<script setup lang="ts">
const menus = ref([
    { to: "home" },
    { to: "service" },
    { to: "pricing" },
    { to: "contract" },
]);
</script>
<template>
    <div
        id="navbar-collapse"
        class="hs-collapse rounded-b-2xl bg-[#ffffffee] _md:bg-menu-br md:bg-clip-text bg-right-bottom bg-no-repeat shaddow pl-8 hidden overflow-hidden transition-all duration-300 basis-full grow md:block"
    >
        <div
            class="grid px-[8%] grid-cols-2 md:flex gap-y-4 pb-2 gap-x-0 mt-5 md:flex-row md:items-center md:justify-end md:gap-y-0 md:gap-x-10 md:mt-0 md:ps-7 _sm:pr-10"
        >
            <LandingHeaderMenuItem
            
                v-for="(menu, index) in menus"
                :to="menu.to"
                :key="index"
            />
            <div>
                <router-link
                    class="group whitespace-nowrap inline-flex items-center md:border-2 gap-x-2 py-2 px-3 text-white font-medium boder md:bg-transparent md:border-primary-300 text-sm bg-primary-500 rounded-md shadow focus:outline-none md:text-primary-500"
                    :href="route('register')"
                >
                    Get Started
                </router-link>
            </div>
        </div>
    </div>
</template>
