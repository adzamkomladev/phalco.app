<script setup lang="ts">
const socials = ref([
    {
        icon: "apple",
        to: "apple",
    },
    {
        icon: "google",
        to: "gmail",
    },
    {
        icon: "x",
        to: "x",
    },
]);
</script>
<template>
    <div class="bg-primary-300 text-white p-5 flex flex-col sm:flex-row gap-8">
        <div class="flex items-center gap-8 justify-center h-5">
            <SharedCommonIcon name="logo_full" class="h-24 scale-200" />
        </div>

        <div
            class="grid font-light grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0"
        >
            <div class="grid gap-2">
                <p class="font-bold">About Us</p>
                <p class="font-thin">Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
            </div>
            <div class="grid gap-2">
                <p class="font-bold">Producs</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
            </div>
            <div class=" ">
                <p class="font-bold">Campaign</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
            </div>
        </div>
        <div class="grid gap-8">
            <p class="font-black text-xl">Contact</p>
            <p class="font-[50]">Komla Azam :+233 000 0000 000</p>
        </div>
        <div class="flex gap-8">
            <button v-for="(social, index) in socials" :key="index">
                <SharedCommonIcon :name="social.icon" :size="40" />
            </button>
        </div>
        <div class="">
            <p>2024 Phalco</p>
            <p>Terms of service | Privacy policy</p>
        </div>
    </div>
</template>
