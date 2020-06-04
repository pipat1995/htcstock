const getId = id => axios.get("/historeis/" + id + "/edit")

export  {
    getId
}