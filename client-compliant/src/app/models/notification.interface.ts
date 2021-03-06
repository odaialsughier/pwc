import {User} from './user.interface';

export interface Notification {
    id: number,
    patient_id: number,
    staff_id: number,
    comment: string,
    url: string,
    status: string,
    type: string,
    group_id: number,
    created_at: string,
    waitingSince: string
    createdBy: User
}
