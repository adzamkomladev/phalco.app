<script setup lang="ts">
import FooterIllustrationImage from "~/resources/svg/welcome/footer_image.webp?url";
import FooterIllustrationOrangeLine from "~/resources/svg/welcome/footer_orange_line.svg?url";
import FooterIllustrationPinkLine from "~/resources/svg/welcome/footer_pink_line.svg?url";

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
        <div class="py-10 lg:pt-20 mx-auto">
            <!-- Grid -->
            <div
                class="grid grid-cols-[10rem_minmax(0,1fr)] lg:grid-cols-[15rem_minmax(0,1fr)] grid-rows-[auto_minmax(0,1fr)] gap-4"
            >
                <!-- Phalco Logo -->
                <div class="_sm:col-span-2">
                    <SharedCommonIcon
                        name="logo_full"
                        class="h-auto w-[11rem] md:w-[12rem] px-4 text-white"
                    />
                </div>
                <!-- End Logo -->
                <div
                    class="mx-auto _sm:text-center _sm:gap-16 _sm:pr-[10rem] row-span-2 _sm:flex-col flex justify-center gap-5"
                >
                    <div class="">
                        <h4 class="font-semibold text-white">Products</h4>
                        <div class="mt-3 grid space-y-5">
                            <p
                                v-for="(item, index) in products"
                                :key="index"
                                class="text-white/70 hover:text-white"
                            >
                                {{ item }}
                            </p>
                        </div>
                    </div>

                    <div class="">
                        <h4 class="font-semibold text-white">Contact</h4>
                        <div class="mt-3 grid space-y-5">
                            <p class="text-white hover:text-white">
                                Komla Adzam
                            </p>
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
                </div>

                <div
                    class="row-span-3 flex _sm:flex-col _sm:row-span-3 _sm:row-start-2 justify-between"
                >
                    <img
                        :src="FooterIllustrationPinkLine"
                        alt="Footer illustration"
                        class="sm:w-1/3 _md:mt-1"
                        aria-hidden="true"
                    />
                    <img
                        :src="FooterIllustrationImage"
                        alt="Footer illustration"
                        class="w-auto object-contain max-h-"
                        aria-hidden="true"
                    />
                </div>
                <div class="">
                    <div class="md:ml-16">
                        <h3 class="text-xl font-semibold text-white">
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
                <div class="_sm:col-span-full md:ml-16 _sm:hidden _sm:text-end">
                    <p class="_xs:text-xs text-sm text-white/70">
                        © 2024 Phalco. All rights reserved.
                    </p>
                </div>
            </div>
            <!-- End Grid -->
        </div>
        <img
            :src="FooterIllustrationOrangeLine"
            alt="Footer illustration"
            class="absolute _md:-top-10 md:bottom-0 right-0 h-32 _md:-rotate-90 md:h-40 lg:h-48 w-auto"
            aria-hidden="true"
        />
        <!-- Illustration -->
    </footer>
</template>
