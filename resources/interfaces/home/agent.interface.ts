import { RequestStatus } from "../table/index.interface";


export interface ElectionRequestRequestStatusProps {
    election_name: string;
    date_sent: Date;
    status: RequestStatus;
}