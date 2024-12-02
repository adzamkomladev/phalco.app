
export interface CreateVoteRequestProps {
    ballot: Ballot;
}

export interface Ballot {
    id: number;
    election_id: number;
    position: string;
    description: string;
    code: string;
    status: string;
    created_at: Date;
    updated_at: Date;
    options: Option[];
}

export interface Option {
    id: number;
    ballot_id: number;
    name: string;
    avatar: null;
    order: number;
    status: string;
    created_at: Date;
    updated_at: Date;
}
