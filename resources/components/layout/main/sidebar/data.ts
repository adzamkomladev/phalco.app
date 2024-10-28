import { SideBarMenuProps } from "~/resources/interfaces/layout/main-sidebar.interface";
const pollingStationId = useProperty("elections.agentPollingStation.id");
const electionId = useProperty("elections.selected.id");



export const menus: SideBarMenuProps[] = [
    {
        label: "home",
        icon: "home",
        to: "home",
    },
    {
        label: "election",
        icon: "election",
        sublink: [
            {
                label: "dashboard",
                to: "elections.index",
                icon: "",
            },
            {
                label: "new election",
                to: "elections.create",
                icon: "",
            },
        ],
    },
    {
        label: "nominations",
        icon: "nomination",
        sublink: [
            {
                label: "dashboard",
            },
            {
                label: "new nomination",
            },
        ],
    },
    {
        label: "campaigns",
        icon: "campaign_main",
    },
    {
        label: "audiences",
        icon: "accessibility",
    },
    {
        label: "strategies",
        icon: "strategy",
    },
    {
        label: "donations",
        icon: "donation",
    },
    {
        label: "voting",
        icon: "vote",
        sublink: [
            {
                label: "polling station",
                icon: "polling_station",
                sublink: [
                    {
                        label: "dashboard",
                        to: "voting.polling-stations.index",
                        icon: "",
                    },
                    {
                        label: "New polling station",
                        to: "voting.polling-stations.create",
                        icon: "",
                    },
                ],
            },
            {
                label: "agent",
                icon: "agent",
                sublink: [
                    {
                        label: "dashboard",
                        to: "voting.agents.index",
                        icon: "",
                    },
                    {
                        label: "new agent",
                        to: "voting.agents.create",
                        icon: "",
                    },
                ],
            },
            {
                label: "ballot",
                icon: "ballot",
                sublink: [
                    {
                        label: "dashboard",
                        to: "voting.ballots.index",
                        icon: "",
                    },
                    {
                        label: "new ballot",
                        to: "voting.ballots.create",
                        icon: "",
                    },
                ],
            },
            {
                label: "request",
                icon: "request",
                to: "voting.ballots.create",
                sublink: [
                    {
                        label: "dashboard",
                        // to: {
                        //     name: "voting.requests.index",
                        //     params: { electionId, pollingStationId },
                        // },
                        icon: "",
                    },
                ],
            },
        ],
    },
    {
        label: "coalation",
        icon: "coalation",
        to: "password.reset",
    },
    {
        label: "Finance",
        icon: "cedi",
        to: "password.reset",
    },
];