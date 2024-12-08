export interface Ballot {
    id: number;
    election_id: number;
    position: string;
    description: string;
    code: string;
    status: string;
    options: Option[];
}

export interface Option {
    id: number;
    ballot_id: number;
    order: number;
    name: string;
    avatar?: string;
    party?: string;
    party_image?: string;
    votes: number;
}


export interface BallotHeader {
    title: string;
    description: string;
    status: string;
}
