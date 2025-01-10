import { SideBarMenuProps } from "~/resources/interfaces/layout/main-sidebar.interface";

export const menus: SideBarMenuProps[] = [
    {
        label: "Home",
        icon: "home",
        to: "home",
    },
    {
        label: "Elections",
        icon: "election",
        sublink: [
            {
                label: "Dashboard",
                to: "elections.index",
            },
            {
                label: "New election",
                to: "elections.create",
            },
        ],
    },
    // {
    //     label: "Nominations",
    //     icon: "users",
    // },
    {
        label: "Campaigns",
        icon: "campaign_main",
        sublink: [
            {
                label: "SMS",
                icon: "polling_station",
                sublink: [
                    {
                        label: "Dashboard",
                        to: "campaigns.sms.index",
                    },
                    {
                        label: "New campaign",
                        to: "campaigns.sms.create",
                    },
                    {
                        label: "Senders",
                        to: "campaigns.sms.senders.index",
                    },
                ],
            }
        ],
    },
    {
        label: "Audiences",
        icon: "accessibility",
        sublink: [
            {
                label: "Dashboard",
                to: "audiences.index",
            },
            {
                label: "New audience",
                to: "audiences.create",
            },
        ],
    },
    // {
    //     label: "Strategies",
    //     icon: "strategy",
    // },
    // {
    //     label: "Donations",
    //     icon: "donation",
    // },
    {
        label: "Voting",
        icon: "vote",
        sublink: [
            {
                label: "Polling Stations",
                icon: "polling_station",
                sublink: [
                    {
                        label: "Dashboard",
                        to: "voting.polling-stations.index",
                    },
                    {
                        label: "New polling station",
                        to: "voting.polling-stations.create",
                    },
                ],
            },
            {
                label: "Agents",
                icon: "agent",
                sublink: [
                    {
                        label: "Dashboard",
                        to: "voting.agents.index",
                    },
                    {
                        label: "New agent",
                        to: "voting.agents.create",
                    },
                ],
            },
            {
                label: "Ballots",
                icon: "ballot",
                sublink: [
                    {
                        label: "Dashboard",
                        to: "voting.ballots.index",
                    },
                    {
                        label: "New ballot",
                        to: "voting.ballots.create",
                    },
                ],
            },
            // {
            //     label: "Requests",
            //     icon: "request",
            //     to: "voting.requests.index",
            // },
        ],
    },
    // {
    //     label: "Coalation",
    //     icon: "coalation",
    //     to: "password.reset",
    // },
    {
        label: "Finance",
        icon: "cedi",
        to: "finance.index",
    },
];
