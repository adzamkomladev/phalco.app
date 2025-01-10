export type StatusMode = "active" | "inactive";
export type AvailabilityMode = "enabled" | "disabled";
export type StatusType = StatusMode | AvailabilityMode;

export interface TableHeadProps {
    column: any;
    index: number;
}