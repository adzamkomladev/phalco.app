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
    <div
        class="bg-primary-400 p-[8%] md-[4%] py-14 md:bg-white md:text-gray-600 text-white"
    >
        <div class="md:grid md:gap-4 md:grid-cols-13">
            <div
                class="col-span-4 _md:py-8 flex _md:items-center _md:justify-center"
            >
                <router-link>
                    <SharedCommonIcon
                        class="text-primary-500 h-8 _md:text-white"
                        name="logo_full"
                    />
                </router-link>
            </div>

            <div
                class="flex-1 col-span-6 font-thin justify-center text-base grid grid-cols-3 gap-6 xl:gap-10 lg:space-y-0"
            >
                <div class="flex flex-col gap-2 text-sm">
                    <p class="font-bold md:text-black text-lg">About Us</p>

                </div>
                <div class="flex flex-col gap-2 text-sm">
                    <p class="font-bold md:text-black text-lg">Product</p>


                </div>
                <div class="flex flex-col gap-2 text-sm">
                    <p class="font-bold md:text-black text-lg">Campaign</p>

                </div>
            </div>
            <div class="flex flex-col col-span-3">
                <p class="font-bold text-xl md:text-black">Contact</p>
                <p class="font-medium">
                    <a class="md:hidden" href="tel:+233202442452"
                        >Support : +233 202 442 452</a
                    >
                    <a class="_md:hidden" href="skype:+233202442452"
                        >Support : +233 202 442 452</a
                    >
                </p>
                <div class="flex gap-4 text-black">
                    <button>
                        <SharedCommonIcon name="apple" class="h-12" />
                    </button>
                    <button>
                        <SharedCommonIcon name="google" class="w-8 h-8" />
                    </button>
                    <button>
                        <SharedCommonIcon name="x" class="w-12 h-8" />
                    </button>
                </div>
            </div>
        </div>
        <div class="md:text-gray-600 py-10">
            <p>2024 Phalco</p>
            <p>Terms of service | Privacy policy</p>
        </div>
    </div>
</template>
