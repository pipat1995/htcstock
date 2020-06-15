function status(response) {
    if (response.status >= 200 && response.status < 300) {
        return Promise.resolve(response)
    } else {
        return Promise.reject(new Error(response.statusText))
    }
}

function json(response) {
    return response.json()
}


const getAccessoriesId = id => fetch("/accessories/accessories/" + id + "/edit").then(status).then(json)


const getHistorieTakeId = id => fetch("/histories/take/" + id + "/edit").then(status).then(json)
const getHistorieLendId = id => fetch("/histories/lend/" + id + "/edit").then(status).then(json)



const clearModal = (modal) => {
    modal.find('.modal-body form')[0].reset()
    for (const _el of modal.find('.form-control')) {
        _el.disabled = false
    }
    modal.find('.modal-body form')[0].action = window.location.pathname
    modal.find('#methodPut').remove()
}


function ISOtoLongDate(isoString, locale = "en-US") {
    const options = {
        month: "long",
        day: "numeric",
        year: "numeric"
    };
    const date = new Date(isoString);
    const longDate = new Intl.DateTimeFormat(locale, options).format(date);
    return longDate;
}

function ISOtoDate(isoString, locale = "en-US") {
    const options = {
        month: "numeric",
        day: "numeric",
        year: "numeric"
    };
    const date = new Date(isoString);
    const longDate = new Intl.DateTimeFormat(locale, options).format(date);
    return longDate;
}
