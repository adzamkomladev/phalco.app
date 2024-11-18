<script setup lang="ts">
import FastDecisionImage from "~/resources/svg/welcome/fast_declision.webp?url";
import CampaigningImage from "~/resources/svg/welcome/campaigning.webp?url";
import VotingImage from "~/resources/svg/welcome/voting.webp?url";
import ManagementImage from "~/resources/svg/welcome/management.webp?url";
import StepsImage from "~/resources/svg/welcome/voting_steps.svg?url";
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
        "Lorem mollitia omnis dolorem",
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
    <section
        id="pricing"
        class="bg-white py-8 flex flex-col gap-8 place-content-center scroll-mt-20"
    >
        <div class="flex px-[8%] relative flex-col text-center gap-2 py-4">
            <img
                class="_sm:hidden absolute right-[10%] bottom-1/2"
                :src="ObjectsImage"
            />
            <p
                v-motion-fade-visible
                :duration="300"
                :delay="90"
                class="font-black font-sans text-3xl md:text-4xl"
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
        <div class="grid grid-cols-6">
            <WelcomeSectionPricingStandard
                :data="standard"
                class="border-gray-700 bg-white"
                buttonClass="text-white bg-black"
            />

            <WelcomeSectionPricingPremium
                :data="premium"
                class="border-gray-700 bg-white"
                buttonClass="text-white bg-black"
            />
        </div>
    </section>
</template>

<style scoped></style>
