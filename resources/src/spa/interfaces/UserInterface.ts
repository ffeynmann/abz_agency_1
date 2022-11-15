export interface UserInterface {
    id: number,
    name: string,
    email: string,
    phone: string,
    position_id: string|null,
    photo: string|null
}

export interface UserPaginationInterface {
    page: number|null,
    offset: number|null,
    count: number|null
}

