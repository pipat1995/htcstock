
const getTakeId = id => axios.get("/historeis/take/" + id)
const getLendId = id => axios.get("/historeis/lend/" + id)
const clearModal = (modal) => {
    modal.find('.modal-body form')[0].reset()
    modal.find('.modal-title').text('')
    modal.find('.modal-body form')[0].action = window.location.pathname
    modal.find('#methodPut').remove()
}
export  {
    getTakeId,
    getLendId,
    clearModal
}