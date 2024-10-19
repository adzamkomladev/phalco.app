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
    <div class="bg-primary-400 px-[9%] py-10  md:bg-white md:text-gray-600 text-white">
        <div class="md:grid md:grid-cols-12 ">
            <div
                class="col-span-3 _md:py-8   flex items-center gap-8 justify-center h-5"
            >
                <SharedCommonIcon
                    name="logo_full"
                    class="w-full md:text-primary-500 scale-200"
                />
            </div>

            <div
                class="col-span-6 justify-center text-base grid font-[150] grid-cols-3 gap-6 xl:gap-10 lg:space-y-0"
            >
                <div class="flex flex-col gap-2">
                    <p class="font-bold md:text-black">About Us</p>
                    <p class="font-thin">Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                </div>
                <div class="flex flex-col gap-2">
                    <p class="font-bold md:text-black">Producs</p>
                    <p>Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                </div>
                <div class="flex flex-col gap-2">
                    <p class="font-bold md:text-black">Campaign</p>
                    <p>Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                    <p>Lorem ipsum</p>
                </div>
            </div>
            <div class="flex flex-col col-span-3">
                <p class="font-black text-xl md:text-black">Contact</p>
                <p class="font-[50]">Komla Azam :+233 000 0000 000</p>
                <div class="flex gap-4 text-black">
                    <button v-for="(social, index) in socials" :key="index">
                        <SharedCommonIcon :name="social.icon" class="w-8 h-8" />
                    </button>
                </div>
            </div>
        </div>
        <div class=" md:text-gray-600 py-10">
            <p>2024 Phalco</p>
            <p>Terms of service | Privacy policy</p>
        </div>
    </div>
</template>
