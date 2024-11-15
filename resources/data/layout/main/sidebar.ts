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
            },
            {
                label: "New election",
                to: "elections.create",
            },
        ],
    },
    {
        label: "Nominations",
        icon: "users",
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
                    },
                    {
                        label: "New polling station",
                        to: "voting.polling-stations.create",
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
                    },
                    {
                        label: "New agent",
                        to: "voting.agents.create",
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
                    },
                    {
                        label: "New ballot",
                        to: "voting.ballots.create",
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
        to: "finance.index",
    },
];
