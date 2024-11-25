import { StatusType } from "../../table/index.interface";

export interface PollingStationCardProps {
    id: number;
    code: string;
    votes: number;
    name: string;
    status: StatusType;
}

export interface PopularPollingStationsCardProps {
    pollingStations: PopularPollingStation[];
}

export interface PopularPollingStation {
    id: number;
    name: string;
    votes: number;
}
