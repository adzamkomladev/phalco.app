<script setup lang="ts">
import StarImage from "~/resources/svg/welcome/pricing_star.svg?url";
import ObjectsImage from "~/resources/svg/welcome/3_objects.svg?url";

const standard = {
    type: "standard",
    amount: {
        value: 15,
        rate: "month",
    },
    description: "mollitia omnis dolorem",
    offers: [
        "Lorem ipsum dolor sit amet",
        "Lorem adipisicing atque",
        "Lorem iusto vel",
    ],
};

const premium = {
    type: "professional",
    amount: {
        value: 25,
        rate: "month",
    },
    description: "mollitia omnis dolorem",
    offers: [
        "Lorem ipsum dolor sit amet",
        "Lorem adipisicing atque",
        "Lorem mollitia omnis dolorem",
        "Lorem iusto vel",
        "Lorem iusto vel",
        "Lorem iusto vel",
        "Lorem iusto vel",
    ],
};
</script>

<template>
    <section id="pricing" class="bg-white py-20 scroll-mt-20 relative">
        <div
            class="flex overflow-hidden px-[8%] relative flex-col text-center gap-2 py-4"
        >
            <p
                v-motion-fade-visible
                :duration="300"
                :delay="90"
                class="font-black font-unbounded text-3xl md:text-4xl text-black"
            >
                Pricing
            </p>
            <span
                v-motion-fade-visible
                :duration="360"
                :delay="90"
                class="text-gray-700 block self-center md:text-center lg:w-[50rem] text-balance"
            >
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore
            </span>
        </div>
        <div class="flex justify-around">
            <div
                class="flex gap-5 peer _lg:flex-col _md:w-full _md:px-[10%] md:px-5 items-center"
            >
                <div
                    class="hover:scale-105 duration-300 z-10 transition-all peer place-items-center"
                >
                    <WelcomeSectionPricingStandard :data="standard" class="" />
                </div>
                <div
                    class="peer-hover:scale-95 shrink-0 transition-all duration-300"
                >
                    <WelcomeSectionPricingPremium
                        :data="premium"
                        class="bg-primary-500 scale-0 text-white peer-hover:scale-90"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped></style>
