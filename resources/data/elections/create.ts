import { ElectionStageProps } from "~/resources/interfaces/elections/create.interface";

export const defaultElectionStages: ElectionStageProps[] = [
    {
        title: "Voting",
        name: "voting",
        start: null,
        end: null,
    },
    {
        title: "Vetting",
        name: "vetting",
        start: null,
        end:null,
    },
    {
        title: "Campaigns",
        name: "campaigns",
        start: null,
        end:null,
    },
    {
        title: "Collation",
        name: "collation",
        start: null,
        end:null,
    },
    {
        title: "Nominations",
        name: "nominations",
        start: null,
        end:null,
    }
];
