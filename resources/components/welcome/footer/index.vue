<script setup lang="ts">
import FooterIllustration1 from "~/resources/svg/welcome/footer_1.webp?url";
import FooterIllustration2 from "~/resources/svg/welcome/footer_2.svg?url";

const products = [
    "Nomination Platform",
    "Voting Arrangments",
    " Donanation & Finance",
    "Campaign Platform",
];

const contact = [
    "Level 40/55 Collins Street",
    "Melbourne VIC 3000",
    "support@phalco.co",
];

const social = [
    { name: "Instagram", url: "#", icon: "instagram" },
    { name: "Twitter", url: "#", icon: "twitter" },
    { name: "Youtube", url: "#", icon: "youtube" },
];
</script>

<template>
    <footer class="bg-secondary-500 text-sm relative overflow-hidden">
        <div class="max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 lg:pt-20 mx-auto">
            <!-- Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                <div class="col-span-full lg:col-span-1">
                    <SharedCommonIcon
                        name="logo_full"
                        class="h-auto w-32 text-white"
                    />
                </div>

                <div class="col-span-1">
                    <h4 class="font-semibold text-white">Products</h4>
                    <div class="mt-3 grid space-y-3">
                        <p
                            v-for="(item, index) in products"
                            :key="index"
                            class="text-white/70 hover:text-white"
                        >
                            {{ item }}
                        </p>
                    </div>
                </div>

                <div class="col-span-1">
                    <h4 class="font-semibold text-white">Contact</h4>
                    <div class="mt-3 grid space-y-3">
                        <p class="text-white hover:text-white">Komla Adzam</p>
                        <p class="text-white/70 hover:text-white">
                            komla@yopmail.com
                        </p>
                        <p class="text-white/70 hover:text-white">
                            +233 456 45466
                        </p>
                        <div class="space-x-4">
                            <router-link
                                v-for="(item, index) in social"
                                :key="index"
                                :href="item.url"
                                class="inline-flex justify-center items-center w-8 h-8 text-center text-white hover:bg-white/10 rounded-full transition bg-[#ffffff20] p-2"
                            >
                                <SharedCommonIcon
                                    :name="item.icon"
                                ></SharedCommonIcon>
                            </router-link>
                        </div>
                    </div>
                </div>

                <div class="col-span-2 z-10">
                    <div
                        class="bg-white/10 rounded-xl p-6 text-center sm:text-left"
                    >
                        <h3 class="text-xl font-semibold text-white mb-3">
                            What are you waiting for??
                        </h3>
                        <p class="text-white/70 mb-4">
                            Create an account and Get Started now
                        </p>
                        <router-link
                            :href="route('register')"
                            class="bg-white text-phalco-blue px-6 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors"
                        >
                            Get Started
                        </router-link>
                    </div>
                </div>
            </div>
            <!-- End Grid -->

            <div
                class="mt-5 sm:mt-12 grid gap-y-2 sm:gap-y-0 sm:flex sm:justify-between sm:items-center"
            >
                <div class="flex justify-between items-center">
                    <p class="_xs:text-xs text-sm text-white/70">
                        © 2024 Phalco. All rights reserved.
                    </p>
                </div>

                <!-- Social Brands -->
            </div>
        </div>

        <!-- Illustration -->

        <img
            :src="FooterIllustration1"
            alt="Footer illustration"
            class="absolute bottom-0 right-0 _sm:-right-10 h-72 _sm:h-[40vw] md:h-40 lg:h-48 w-auto object-contain"
            aria-hidden="true"
        />
        <img
            :src="FooterIllustration2"
            alt="Footer illustration"
            class="absolute -top-10 md:hidden right-0 h-32 -rotate-90 md:h-40 lg:h-48 w-auto object-contain"
            aria-hidden="true"
        />
    </footer>
</template>
