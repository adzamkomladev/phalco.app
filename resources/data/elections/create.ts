import { ElectionStageProps } from "~/resources/interfaces/elections/create.interface";

export const defaultElectionStages: ElectionStageProps[] = [
    {
        title: "Vetting",
        date: {
            start: new Date("2024-01-10T09:00:00"),
            end: new Date("2024-01-12T17:00:00"),
        },
    },
    {
        title: "Nominations",
        date: {
            start: new Date("2024-01-15T09:00:00"),
            end: new Date("2024-01-18T17:00:00"),}
    },
    {
        title: "Campaigning",
        date: {
            start: new Date("2024-01-20T09:00:00"),
            end: new Date("2024-02-10T17:00:00"),
        },
    },
    {
        title: "Voting",
        date: {
            start: new Date("2024-09-15T08:00:00"),
            end: new Date("2024-12-30T18:00:00"),
        },
    },
    {
        title: "Collation",
        date: {
            start: new Date("2025-01-01T09:00:00"),
            end: new Date("2025-01-09T23:59:00"),
    }},
    {
        title: "Result",
        date: {
            start: new Date("2025-02-10T10:00:00"),
            end: new Date("2025-02-17T12:00:00"),
        },
    },
];
