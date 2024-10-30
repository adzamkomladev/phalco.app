import { SideBarMenuProps } from "~/resources/interfaces/layout/main-sidebar.interface";
const pollingStationId = useProperty("elections.agentPollingStation.id");
const electionId = useProperty("elections.selected.id");

export const menus: SideBarMenuProps[] = [
    {
        label: "Home",
        icon: "home",
        to: "home",
    },
    {
        label: "Election",
        icon: "election",
        sublink: [
            {
                label: "Dashboard",
                to: "elections.index",
                icon: "",
            },
            {
                label: "New election",
                to: "elections.create",
                icon: "",
            },
        ],
    },
    {
        label: "Nominations",
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
        label: "Campaigns",
        icon: "campaign_main",
    },
    {
        label: "Audiences",
        icon: "accessibility",
    },
    {
        label: "Strategies",
        icon: "strategy",
    },
    {
        label: "Donations",
        icon: "donation",
    },
    {
        label: "Voting",
        icon: "vote",
        sublink: [
            {
                label: "Polling station",
                icon: "polling_station",
                sublink: [
                    {
                        label: "Dashboard",
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
                label: "Agent",
                icon: "agent",
                sublink: [
                    {
                        label: "Dashboard",
                        to: "voting.agents.index",
                        icon: "",
                    },
                    {
                        label: "New agent",
                        to: "voting.agents.create",
                        icon: "",
                    },
                ],
            },
            {
                label: "Ballot",
                icon: "ballot",
                sublink: [
                    {
                        label: "Dashboard",
                        to: "voting.ballots.index",
                        icon: "",
                    },
                    {
                        label: "New ballot",
                        to: "voting.ballots.create",
                        icon: "",
                    },
                ],
            },
            {
                label: "Request",
                icon: "request",
                to: "voting.ballots.create",
                sublink: [
                    {
                        label: "Dashboard",
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
        label: "Coalation",
        icon: "coalation",
        to: "password.reset",
    },
    {
        label: "Finance",
        icon: "cedi",
        to: "password.reset",
    },
];
