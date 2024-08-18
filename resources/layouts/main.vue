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
        <header
            class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px] dark:bg-neutral-800 dark:border-neutral-700"
        >
            <nav
                class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto"
            >
                <div class="me-5 lg:me-0 lg:hidden">
                    <!-- Logo -->
                    <router-link
                        class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                        :href="route('home')"
                        aria-label="Phalco"
                    >
                        <svg
                            class="w-28 h-auto"
                            width="370"
                            height="70"
                            viewBox="0 0 370 70"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <g clip-path="url(#clip0_1471_2979)">
                                <path
                                    d="M97.6342 57.1266H2.3671C1.05946 57.1266 0 58.1847 0 59.4937C0 60.8013 1.05812 61.8608 2.3671 61.8608H97.6329C98.9405 61.8608 100 60.8027 100 59.4937C100 58.186 98.9419 57.1266 97.6342 57.1266Z"
                                    fill="#07689F"
                                />
                                <path
                                    d="M14.295 17.07L26.4801 50.7979C26.831 51.7599 27.7371 52.3603 28.7084 52.3603C28.9766 52.3603 29.2488 52.3136 29.513 52.2216C30.7433 51.7732 31.3811 50.4189 30.9368 49.1886L19.2934 16.9633L51.6122 5.35459L69.5736 49.2634C69.9486 50.1787 70.8306 50.7338 71.7646 50.7338C72.0648 50.7338 72.365 50.6778 72.6613 50.5577C73.8728 50.0626 74.4506 48.6803 73.9556 47.47L55.1362 1.46368C55.1122 1.40364 55.0761 1.35293 55.0468 1.29689C55.0107 1.22617 54.9774 1.15412 54.936 1.08874C54.8907 1.01935 54.8386 0.95664 54.7879 0.892592C54.7439 0.837884 54.7025 0.780506 54.6545 0.729802C54.5891 0.660416 54.5157 0.601707 54.4423 0.541663C54.401 0.508304 54.3623 0.470943 54.3196 0.440253C54.2262 0.373537 54.1274 0.318828 54.0273 0.266789C53.998 0.252111 53.97 0.233431 53.9406 0.220088C53.8205 0.164046 53.6964 0.121349 53.5697 0.0866568C53.5537 0.0826538 53.539 0.07598 53.5243 0.0719771C53.3882 0.0372845 53.2508 0.0172698 53.1093 0.0065952C53.0973 0.00526087 53.0866 0.00392619 53.0746 0.00259186C52.9439 -0.00407978 52.8118 0.00259398 52.6783 0.0172716C52.6503 0.0199403 52.6236 0.0199391 52.5956 0.0239421C52.4942 0.0386198 52.3928 0.0666418 52.2927 0.0959971C52.2447 0.10934 52.1966 0.113342 52.1486 0.130688L15.7254 13.2138C14.6219 13.6114 14.0028 14.7429 14.2016 15.8584C14.1296 16.2534 14.1496 16.667 14.295 17.07Z"
                                    fill="#07689F"
                                />
                                <path
                                    d="M48.0678 20.5045L42.0247 36.3657L36.2283 31.6595C35.2116 30.8269 33.7225 30.9897 32.9005 32.0011C32.0732 33.0179 32.2307 34.507 33.2421 35.3289L41.5777 42.0967C41.595 42.1113 41.6177 42.1153 41.6364 42.13C41.8152 42.2661 42.0086 42.3875 42.2301 42.4716C42.2395 42.4756 42.2502 42.4769 42.2595 42.4796C42.2969 42.493 42.3329 42.4996 42.3703 42.5116C42.6024 42.585 42.8359 42.6291 43.0708 42.6291C43.2829 42.6291 43.4911 42.5904 43.6952 42.5343C43.754 42.5183 43.8087 42.497 43.866 42.4769C44.0128 42.4249 44.1529 42.3569 44.289 42.2741C44.3424 42.2421 44.3958 42.2141 44.4465 42.1781C44.6133 42.058 44.7707 41.9219 44.9068 41.7551L44.9095 41.7511C44.9228 41.7351 44.9308 41.7164 44.9428 41.699C45.0723 41.5296 45.171 41.3481 45.2484 41.16C45.2564 41.1386 45.2724 41.1239 45.2804 41.1026L52.4871 22.1858C52.9542 20.9649 52.3444 19.5972 51.1181 19.1342C49.9079 18.6738 48.5309 19.2756 48.0678 20.5045Z"
                                    fill="#07689F"
                                />
                                <path
                                    d="M96.9123 65.1793H55.8857C54.578 65.1793 53.5186 66.2374 53.5186 67.5464C53.5186 68.854 54.5767 69.9135 55.8857 69.9135H96.9123C98.2199 69.9135 99.2794 68.8553 99.2794 67.5464C99.2794 66.2387 98.2213 65.1793 96.9123 65.1793Z"
                                    fill="#07689F"
                                />
                                <path
                                    d="M130.301 21.235C131.182 20.0286 132.702 18.9498 134.859 17.9986C137.017 17.0474 139.372 16.5718 141.924 16.5718C145.868 16.5718 149.29 17.4534 152.19 19.2166C155.09 20.9798 157.305 23.3809 158.836 26.4201C160.367 29.4593 161.133 32.8348 161.133 36.5468C161.133 40.2587 160.367 43.6343 158.836 46.6734C157.305 49.7126 155.09 52.1138 152.19 53.8769C149.29 55.6401 145.868 56.5217 141.924 56.5217C139.279 56.5217 136.947 56.0693 134.929 55.1645C132.911 54.2597 131.368 53.1114 130.301 51.7194V68.0056H120V17.407H130.301V21.235ZM132.737 44.3767C134.639 46.395 137.191 47.4042 140.393 47.4042C143.64 47.4042 146.204 46.395 148.083 44.3767C149.962 42.3583 150.902 39.7483 150.902 36.5468C150.902 33.438 149.939 30.8628 148.014 28.8213C146.088 26.7797 143.548 25.7589 140.393 25.7589C137.145 25.7589 134.581 26.7217 132.702 28.6473C130.823 30.5728 129.883 33.206 129.883 36.5468C129.883 39.7483 130.834 42.3583 132.737 44.3767ZM201.814 20.9566C204.203 23.7869 205.398 27.8237 205.398 33.0668V55.6865H194.819V33.0668C194.819 30.3292 194.135 28.3573 192.766 27.1509C191.397 25.9445 189.599 25.3413 187.372 25.3413C185.47 25.3413 183.753 26.0953 182.222 27.6033C180.69 29.1113 179.971 31.7212 180.064 35.4332V55.6865H169.694V3H180.064V20.8174C181.317 19.5646 182.894 18.567 184.797 17.8246C186.699 17.0822 188.532 16.711 190.295 16.711C195.585 16.711 199.424 18.1262 201.814 20.9566ZM244.582 51.8586C243.701 53.0649 242.181 54.1437 240.024 55.0949C237.866 56.0461 235.511 56.5217 232.959 56.5217C229.015 56.5217 225.593 55.6401 222.693 53.8769C219.794 52.1138 217.578 49.7126 216.047 46.6734C214.516 43.6343 213.75 40.2587 213.75 36.5468C213.75 32.8348 214.516 29.4593 216.047 26.4201C217.578 23.3809 219.794 20.9798 222.693 19.2166C225.593 17.4534 229.015 16.5718 232.959 16.5718C235.604 16.5718 237.936 17.0242 239.954 17.929C241.972 18.8338 243.515 19.9822 244.582 21.3742V17.407H254.883V55.6865H244.582V51.8586ZM242.146 28.7169C240.244 26.6985 237.692 25.6893 234.491 25.6893C231.243 25.6893 228.679 26.6985 226.8 28.7169C224.921 30.7352 223.981 33.3452 223.981 36.5468C223.981 39.6555 224.944 42.2307 226.869 44.2723C228.795 46.3138 231.335 47.3346 234.491 47.3346C237.738 47.3346 240.302 46.3718 242.181 44.4463C244.06 42.5207 245 39.8875 245 36.5468C245 33.3452 244.049 30.7352 242.146 28.7169ZM265.253 3.0696H275.693V55.6865H265.253V3.0696ZM294.276 53.9813C291.075 52.195 288.534 49.7706 286.655 46.7082C284.776 43.6459 283.836 40.3051 283.836 36.686C283.836 33.0668 284.776 29.7377 286.655 26.6985C288.534 23.6593 291.063 21.2466 294.241 19.4602C297.42 17.6738 300.888 16.7806 304.646 16.7806C308.683 16.7806 312.337 17.7434 315.608 19.669C318.879 21.5946 321.489 24.3437 323.438 27.9165L314.042 31.6052C312.929 29.7029 311.56 28.2761 309.936 27.3249C308.312 26.3737 306.549 25.8981 304.646 25.8981C301.63 25.8981 299.136 26.9189 297.165 28.9605C295.193 31.002 294.207 33.5772 294.207 36.686C294.207 39.7947 295.204 42.3699 297.199 44.4115C299.194 46.453 301.7 47.4738 304.716 47.4738C308.892 47.4738 312.117 45.6178 314.39 41.9059L323.229 45.3859C319.564 52.9026 313.393 56.6609 304.716 56.6609C300.958 56.6609 297.478 55.7677 294.276 53.9813ZM338.715 53.9117C335.537 52.1254 333.02 49.701 331.164 46.6386C329.308 43.5763 328.38 40.2355 328.38 36.6164C328.38 33.0436 329.308 29.7261 331.164 26.6637C333.02 23.6013 335.537 21.177 338.715 19.3906C341.894 17.6042 345.362 16.711 349.12 16.711C352.879 16.711 356.359 17.6042 359.56 19.3906C362.762 21.177 365.302 23.6013 367.181 26.6637C369.06 29.7261 370 33.0436 370 36.6164C370 40.2355 369.06 43.5763 367.181 46.6386C365.302 49.701 362.762 52.1254 359.56 53.9117C356.359 55.6981 352.879 56.5913 349.12 56.5913C345.362 56.5913 341.894 55.6981 338.715 53.9117ZM343.831 27.2553C342.207 28.2065 340.931 29.5057 340.003 31.1528C339.075 32.8 338.611 34.6212 338.611 36.6164C338.611 38.7043 339.063 40.5719 339.968 42.2191C340.873 43.8663 342.126 45.1655 343.726 46.1166C345.327 47.0678 347.125 47.5434 349.12 47.5434C351.069 47.5434 352.844 47.0678 354.445 46.1166C356.045 45.1655 357.31 43.8547 358.238 42.1843C359.166 40.5139 359.63 38.6579 359.63 36.6164C359.63 34.6212 359.166 32.8 358.238 31.1528C357.31 29.5057 356.045 28.2065 354.445 27.2553C352.844 26.3041 351.069 25.8285 349.12 25.8285C347.218 25.8285 345.455 26.3041 343.831 27.2553Z"
                                    fill="#07689F"
                                />
                            </g>
                            <defs>
                                <clipPath id="clip0_1471_2979">
                                    <rect
                                        width="370"
                                        height="69.9135"
                                        fill="white"
                                    />
                                </clipPath>
                            </defs>
                        </svg>
                    </router-link>
                    <!-- End Logo -->
                </div>

                <div
                    class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3"
                >
                    <div class="hidden md:block">
                        <!-- Search Input -->
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5"
                            >
                                <svg
                                    class="shrink-0 size-4 text-gray-400 dark:text-white/60"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.3-4.3" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                class="py-2 ps-10 pe-16 block w-full bg-white border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600"
                                placeholder="Search"
                            />
                            <div
                                class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1"
                            >
                                <button
                                    type="button"
                                    class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                                    aria-label="Close"
                                >
                                    <span class="sr-only">Close</span>
                                    <svg
                                        class="shrink-0 size-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m15 9-6 6" />
                                        <path d="m9 9 6 6" />
                                    </svg>
                                </button>
                            </div>
                            <div
                                class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-3 text-gray-400"
                            >
                                <svg
                                    class="shrink-0 size-3 text-gray-400 dark:text-white/60"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path
                                        d="M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3"
                                    />
                                </svg>
                                <span class="mx-1">
                                    <svg
                                        class="shrink-0 size-3 text-gray-400 dark:text-white/60"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                </span>
                                <span class="text-xs">/</span>
                            </div>
                        </div>
                        <!-- End Search Input -->
                    </div>

                    <div class="flex flex-row items-center justify-end gap-1">
                        <button
                            type="button"
                            class="md:hidden size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        >
                            <svg
                                class="shrink-0 size-4"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>

                        <button
                            type="button"
                            class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        >
                            <svg
                                class="shrink-0 size-4"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path
                                    d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"
                                />
                                <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                            </svg>
                            <span class="sr-only">Notifications</span>
                        </button>

                        <button
                            type="button"
                            class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        >
                            <svg
                                class="shrink-0 size-4"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                            </svg>
                            <span class="sr-only">Activity</span>
                        </button>

                        <!-- Dropdown -->
                        <div
                            class="hs-dropdown [--placement:bottom-right] relative inline-flex"
                        >
                            <button
                                id="hs-dropdown-account"
                                type="button"
                                class="size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:text-white"
                                aria-haspopup="menu"
                                aria-expanded="false"
                                aria-label="Dropdown"
                            >
                                <img
                                    class="shrink-0 size-[38px] rounded-full"
                                    :src="user?.avatar || ''"
                                    alt="Avatar"
                                />
                            </button>

                            <div
                                class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="hs-dropdown-account"
                            >
                                <div
                                    class="py-3 px-5 bg-gray-100 rounded-t-lg dark:bg-neutral-700"
                                >
                                    <p
                                        class="text-sm text-gray-500 dark:text-neutral-500"
                                    >
                                        Signed in as
                                    </p>
                                    <p
                                        class="text-sm font-medium text-gray-800 dark:text-neutral-200"
                                    >
                                        {{ user?.name }}
                                    </p>
                                </div>
                                <div class="p-1.5 space-y-0.5">
                                    <a
                                        class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                        href="#"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-book-user"
                                        >
                                            <path d="M15 13a3 3 0 1 0-6 0" />
                                            <path
                                                d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"
                                            />
                                            <circle cx="12" cy="8" r="2" />
                                        </svg>
                                        Profile
                                    </a>
                                    <a
                                        class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                        href="#"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-wallet"
                                        >
                                            <path
                                                d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"
                                            />
                                            <path
                                                d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"
                                            />
                                        </svg>
                                        Billing
                                    </a>
                                    <router-link
                                        class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                        method="POST"
                                        :href="route('logout')"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-log-out"
                                        >
                                            <path
                                                d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"
                                            />
                                            <polyline
                                                points="16 17 21 12 16 7"
                                            />
                                            <line
                                                x1="21"
                                                x2="9"
                                                y1="12"
                                                y2="12"
                                            />
                                        </svg>
                                        Logout
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <!-- End Dropdown -->
                    </div>
                </div>
            </nav>
        </header>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <div class="-mt-px">
            <!-- Breadcrumb -->
            <div
                class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700"
            >
                <div class="flex items-center py-2">
                    <!-- Navigation Toggle -->
                    <button
                        type="button"
                        class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                        aria-haspopup="dialog"
                        aria-expanded="false"
                        aria-controls="hs-application-sidebar"
                        aria-label="Toggle navigation"
                        data-hs-overlay="#hs-application-sidebar"
                    >
                        <span class="sr-only">Toggle Navigation</span>
                        <svg
                            class="shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <rect width="18" height="18" x="3" y="3" rx="2" />
                            <path d="M15 3v18" />
                            <path d="m8 9 3 3-3 3" />
                        </svg>
                    </button>
                    <!-- End Navigation Toggle -->

                    <!-- Breadcrumb -->
                    <ol class="ms-3 flex items-center whitespace-nowrap">
                        <li
                            class="flex items-center text-sm text-gray-800 dark:text-neutral-400"
                        >
                            Application Layout
                            <svg
                                class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500"
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                />
                            </svg>
                        </li>
                        <li
                            class="text-sm font-semibold text-gray-800 truncate dark:text-neutral-400"
                            aria-current="page"
                        >
                            Dashboard
                        </li>
                    </ol>
                    <!-- End Breadcrumb -->
                </div>
            </div>
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
                        <svg
                            class="w-28 h-auto"
                            width="370"
                            height="70"
                            viewBox="0 0 370 70"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <g clip-path="url(#clip0_1471_2979)">
                                <path
                                    d="M97.6342 57.1266H2.3671C1.05946 57.1266 0 58.1847 0 59.4937C0 60.8013 1.05812 61.8608 2.3671 61.8608H97.6329C98.9405 61.8608 100 60.8027 100 59.4937C100 58.186 98.9419 57.1266 97.6342 57.1266Z"
                                    fill="#07689F"
                                />
                                <path
                                    d="M14.295 17.07L26.4801 50.7979C26.831 51.7599 27.7371 52.3603 28.7084 52.3603C28.9766 52.3603 29.2488 52.3136 29.513 52.2216C30.7433 51.7732 31.3811 50.4189 30.9368 49.1886L19.2934 16.9633L51.6122 5.35459L69.5736 49.2634C69.9486 50.1787 70.8306 50.7338 71.7646 50.7338C72.0648 50.7338 72.365 50.6778 72.6613 50.5577C73.8728 50.0626 74.4506 48.6803 73.9556 47.47L55.1362 1.46368C55.1122 1.40364 55.0761 1.35293 55.0468 1.29689C55.0107 1.22617 54.9774 1.15412 54.936 1.08874C54.8907 1.01935 54.8386 0.95664 54.7879 0.892592C54.7439 0.837884 54.7025 0.780506 54.6545 0.729802C54.5891 0.660416 54.5157 0.601707 54.4423 0.541663C54.401 0.508304 54.3623 0.470943 54.3196 0.440253C54.2262 0.373537 54.1274 0.318828 54.0273 0.266789C53.998 0.252111 53.97 0.233431 53.9406 0.220088C53.8205 0.164046 53.6964 0.121349 53.5697 0.0866568C53.5537 0.0826538 53.539 0.07598 53.5243 0.0719771C53.3882 0.0372845 53.2508 0.0172698 53.1093 0.0065952C53.0973 0.00526087 53.0866 0.00392619 53.0746 0.00259186C52.9439 -0.00407978 52.8118 0.00259398 52.6783 0.0172716C52.6503 0.0199403 52.6236 0.0199391 52.5956 0.0239421C52.4942 0.0386198 52.3928 0.0666418 52.2927 0.0959971C52.2447 0.10934 52.1966 0.113342 52.1486 0.130688L15.7254 13.2138C14.6219 13.6114 14.0028 14.7429 14.2016 15.8584C14.1296 16.2534 14.1496 16.667 14.295 17.07Z"
                                    fill="#07689F"
                                />
                                <path
                                    d="M48.0678 20.5045L42.0247 36.3657L36.2283 31.6595C35.2116 30.8269 33.7225 30.9897 32.9005 32.0011C32.0732 33.0179 32.2307 34.507 33.2421 35.3289L41.5777 42.0967C41.595 42.1113 41.6177 42.1153 41.6364 42.13C41.8152 42.2661 42.0086 42.3875 42.2301 42.4716C42.2395 42.4756 42.2502 42.4769 42.2595 42.4796C42.2969 42.493 42.3329 42.4996 42.3703 42.5116C42.6024 42.585 42.8359 42.6291 43.0708 42.6291C43.2829 42.6291 43.4911 42.5904 43.6952 42.5343C43.754 42.5183 43.8087 42.497 43.866 42.4769C44.0128 42.4249 44.1529 42.3569 44.289 42.2741C44.3424 42.2421 44.3958 42.2141 44.4465 42.1781C44.6133 42.058 44.7707 41.9219 44.9068 41.7551L44.9095 41.7511C44.9228 41.7351 44.9308 41.7164 44.9428 41.699C45.0723 41.5296 45.171 41.3481 45.2484 41.16C45.2564 41.1386 45.2724 41.1239 45.2804 41.1026L52.4871 22.1858C52.9542 20.9649 52.3444 19.5972 51.1181 19.1342C49.9079 18.6738 48.5309 19.2756 48.0678 20.5045Z"
                                    fill="#07689F"
                                />
                                <path
                                    d="M96.9123 65.1793H55.8857C54.578 65.1793 53.5186 66.2374 53.5186 67.5464C53.5186 68.854 54.5767 69.9135 55.8857 69.9135H96.9123C98.2199 69.9135 99.2794 68.8553 99.2794 67.5464C99.2794 66.2387 98.2213 65.1793 96.9123 65.1793Z"
                                    fill="#07689F"
                                />
                                <path
                                    d="M130.301 21.235C131.182 20.0286 132.702 18.9498 134.859 17.9986C137.017 17.0474 139.372 16.5718 141.924 16.5718C145.868 16.5718 149.29 17.4534 152.19 19.2166C155.09 20.9798 157.305 23.3809 158.836 26.4201C160.367 29.4593 161.133 32.8348 161.133 36.5468C161.133 40.2587 160.367 43.6343 158.836 46.6734C157.305 49.7126 155.09 52.1138 152.19 53.8769C149.29 55.6401 145.868 56.5217 141.924 56.5217C139.279 56.5217 136.947 56.0693 134.929 55.1645C132.911 54.2597 131.368 53.1114 130.301 51.7194V68.0056H120V17.407H130.301V21.235ZM132.737 44.3767C134.639 46.395 137.191 47.4042 140.393 47.4042C143.64 47.4042 146.204 46.395 148.083 44.3767C149.962 42.3583 150.902 39.7483 150.902 36.5468C150.902 33.438 149.939 30.8628 148.014 28.8213C146.088 26.7797 143.548 25.7589 140.393 25.7589C137.145 25.7589 134.581 26.7217 132.702 28.6473C130.823 30.5728 129.883 33.206 129.883 36.5468C129.883 39.7483 130.834 42.3583 132.737 44.3767ZM201.814 20.9566C204.203 23.7869 205.398 27.8237 205.398 33.0668V55.6865H194.819V33.0668C194.819 30.3292 194.135 28.3573 192.766 27.1509C191.397 25.9445 189.599 25.3413 187.372 25.3413C185.47 25.3413 183.753 26.0953 182.222 27.6033C180.69 29.1113 179.971 31.7212 180.064 35.4332V55.6865H169.694V3H180.064V20.8174C181.317 19.5646 182.894 18.567 184.797 17.8246C186.699 17.0822 188.532 16.711 190.295 16.711C195.585 16.711 199.424 18.1262 201.814 20.9566ZM244.582 51.8586C243.701 53.0649 242.181 54.1437 240.024 55.0949C237.866 56.0461 235.511 56.5217 232.959 56.5217C229.015 56.5217 225.593 55.6401 222.693 53.8769C219.794 52.1138 217.578 49.7126 216.047 46.6734C214.516 43.6343 213.75 40.2587 213.75 36.5468C213.75 32.8348 214.516 29.4593 216.047 26.4201C217.578 23.3809 219.794 20.9798 222.693 19.2166C225.593 17.4534 229.015 16.5718 232.959 16.5718C235.604 16.5718 237.936 17.0242 239.954 17.929C241.972 18.8338 243.515 19.9822 244.582 21.3742V17.407H254.883V55.6865H244.582V51.8586ZM242.146 28.7169C240.244 26.6985 237.692 25.6893 234.491 25.6893C231.243 25.6893 228.679 26.6985 226.8 28.7169C224.921 30.7352 223.981 33.3452 223.981 36.5468C223.981 39.6555 224.944 42.2307 226.869 44.2723C228.795 46.3138 231.335 47.3346 234.491 47.3346C237.738 47.3346 240.302 46.3718 242.181 44.4463C244.06 42.5207 245 39.8875 245 36.5468C245 33.3452 244.049 30.7352 242.146 28.7169ZM265.253 3.0696H275.693V55.6865H265.253V3.0696ZM294.276 53.9813C291.075 52.195 288.534 49.7706 286.655 46.7082C284.776 43.6459 283.836 40.3051 283.836 36.686C283.836 33.0668 284.776 29.7377 286.655 26.6985C288.534 23.6593 291.063 21.2466 294.241 19.4602C297.42 17.6738 300.888 16.7806 304.646 16.7806C308.683 16.7806 312.337 17.7434 315.608 19.669C318.879 21.5946 321.489 24.3437 323.438 27.9165L314.042 31.6052C312.929 29.7029 311.56 28.2761 309.936 27.3249C308.312 26.3737 306.549 25.8981 304.646 25.8981C301.63 25.8981 299.136 26.9189 297.165 28.9605C295.193 31.002 294.207 33.5772 294.207 36.686C294.207 39.7947 295.204 42.3699 297.199 44.4115C299.194 46.453 301.7 47.4738 304.716 47.4738C308.892 47.4738 312.117 45.6178 314.39 41.9059L323.229 45.3859C319.564 52.9026 313.393 56.6609 304.716 56.6609C300.958 56.6609 297.478 55.7677 294.276 53.9813ZM338.715 53.9117C335.537 52.1254 333.02 49.701 331.164 46.6386C329.308 43.5763 328.38 40.2355 328.38 36.6164C328.38 33.0436 329.308 29.7261 331.164 26.6637C333.02 23.6013 335.537 21.177 338.715 19.3906C341.894 17.6042 345.362 16.711 349.12 16.711C352.879 16.711 356.359 17.6042 359.56 19.3906C362.762 21.177 365.302 23.6013 367.181 26.6637C369.06 29.7261 370 33.0436 370 36.6164C370 40.2355 369.06 43.5763 367.181 46.6386C365.302 49.701 362.762 52.1254 359.56 53.9117C356.359 55.6981 352.879 56.5913 349.12 56.5913C345.362 56.5913 341.894 55.6981 338.715 53.9117ZM343.831 27.2553C342.207 28.2065 340.931 29.5057 340.003 31.1528C339.075 32.8 338.611 34.6212 338.611 36.6164C338.611 38.7043 339.063 40.5719 339.968 42.2191C340.873 43.8663 342.126 45.1655 343.726 46.1166C345.327 47.0678 347.125 47.5434 349.12 47.5434C351.069 47.5434 352.844 47.0678 354.445 46.1166C356.045 45.1655 357.31 43.8547 358.238 42.1843C359.166 40.5139 359.63 38.6579 359.63 36.6164C359.63 34.6212 359.166 32.8 358.238 31.1528C357.31 29.5057 356.045 28.2065 354.445 27.2553C352.844 26.3041 351.069 25.8285 349.12 25.8285C347.218 25.8285 345.455 26.3041 343.831 27.2553Z"
                                    fill="#07689F"
                                />
                            </g>
                            <defs>
                                <clipPath id="clip0_1471_2979">
                                    <rect
                                        width="370"
                                        height="69.9135"
                                        fill="white"
                                    />
                                </clipPath>
                            </defs>
                        </svg>
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
