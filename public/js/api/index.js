const getAccessoriesId = id => axios.get("/accessories/accessories/" + id + "/edit")

const getHistorieTakeId = id => axios.get("/histories/take/" + id + "/edit")
const getHistorieLendId = id => axios.get("/histories/lend/" + id + "/edit")

const clearModal = (modal) => {
    modal.find('.modal-body form')[0].reset()
    modal.find('.modal-title').text('')
    modal.find('.modal-body form')[0].action = window.location.pathname
    modal.find('#methodPut').remove()
}


function ISOtoLongDate(isoString, locale = "en-US") {
  const options = { month: "long", day: "numeric", year: "numeric" };
  const date = new Date(isoString);
  const longDate = new Intl.DateTimeFormat(locale, options).format(date);
  return longDate;
}