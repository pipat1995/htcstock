const getId = id => axios.get("/accessories/" + id + "/edit")

export  {
    getId
}