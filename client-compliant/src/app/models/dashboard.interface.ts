export interface Dashboard {
    newAppointments: timeSeries[],
    newPatients: timeSeries[],
    totalAppointments: number,
    totalPatients: number,
    totalPatientsFemale: number,
    totalPatientsMale: number,
    totalPatientsWithInsurance: number,
    totalPatientsWithoutInsurance: number,
    totalVideoAppointments: number,
}

interface timeSeries {
    date: string,
    count: string
}
